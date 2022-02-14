<?php

namespace App\Http\Controllers;

use App\Models\CodeCompliances;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CodeCompliancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $models = CodeCompliances::get()->loadMissing('events', 'user_codes', 'documents');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting compliances, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'rcd_id' => 'required|integer',
                'rev_id' => 'required|integer',
                'remarks' => 'sometimes|string',
                'document' => 'required|file|max:10240|mimes:docx,xls,pdf'

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }



            DB::beginTransaction();

            $model = new CodeCompliances();

            $model->rcd_id = $request->rcd_id;
            $model->rev_id = $request->rev_id;
            $model->remarks = $request->remarks;
            $model->complied = 'not complied';
            $model->from_date = now()->toDateTimeString();

            $model->save();


            $saveDocuments = $this->storeDocuments($request, $model->id);
            if ($saveDocuments) {
                DB::commit();

                $data = [
                    'success' => true,
                    'message' => 'Compliance submitted succesfully'
                ];


                return response()->json($data, 201);
            } else {
                DB::rollBack();
                $data = [
                    'success' => false,
                    'message' => 'An error occured while uploading compliance documents'
                ];


                return response()->json($data, 500);
            }
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while submitting compliance'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $model = CodeCompliances::find($id);
            if ($model) {

                $data = [
                    'success' => true,
                    'data' => $model->loadMissing('events', 'user_codes', 'documents')
                ];

                return response()->json($data, 200);
            } else {

                $data = [
                    'success' => false,
                    'data' => $model,
                    'message' => 'Compliance was not found'
                ];

                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting roles, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get Organization Compliances
     */
    public function orgCompliances(Request $request)
    {
        try {

            $models = CodeCompliances::leftJoin('rpr_user_codes', 'rpr_code_compliances.rcd_id', '=', 'rpr_user_codes.id')
                ->leftJoin('rpr_org_users', 'rpr_user_codes.rus_id', '=', 'rpr_org_users.id')
                ->leftJoin('rpr_organizations', 'rpr_org_users.ror_id', '=', 'rpr_organizations.id')
                ->where('rpr_organizations.id', $request->org_id)->get()->loadmissing('documents');

            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting organization compliances, please try again'
            ];
            return response()->json($data, 500);
        }
    }


    /**
     * Get Organization Specific Compliance
     */
    public function orgCompliance(Request $request)
    {

        $rules = [
            'id' => 'required|integer', //compliance id

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $data = [
                'success' => false,
                'message' => $validator->errors()->first()
            ];
            return response()->json($data, 422);
        }
        try {

            $models = CodeCompliances::leftJoin('rpr_user_codes', 'rpr_code_compliances.rcd_id', '=', 'rpr_user_codes.id')
                ->leftJoin('rpr_org_users', 'rpr_user_codes.rus_id', '=', 'rpr_org_users.id')
                ->leftJoin('rpr_organizations', 'rpr_org_users.ror_id', '=', 'rpr_organizations.id')
                ->where('rpr_code_compliances.id', $request->id)->get()->loadmissing('documents');

            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting organization compliances, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    public function storeDocuments(Request $request, $id)
    {
        try {
            $model = new Documents();
            $model->cmp_id = $id;
            $model->doc_name = $request->file('document')->getClientOriginalName();
            $model->archive = 1;
            $model->file_type = $request->file('document')->extension();
            $model->content = base64_encode(file_get_contents($request->file('document')->path()));
            $model->file_size = $request->file('document')->getSize();
            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);
            return false;
        }
    }
}
