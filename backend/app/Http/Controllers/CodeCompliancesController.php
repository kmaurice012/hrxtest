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
        try {
            $rules = [
                'rcd_id' => 'required|integer',
                'rev_id' => 'required|integer',
                'remarks' => 'sometimes|string',
                'doc_id' => 'required|integer',
                // 'document' => 'required|file|max:10240|mimes:docx,xls,pdf'
                'document' => 'required|string',
                'document_name' => 'required|string'
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

            $model = CodeCompliances::find($id);

            if ($model) {
                $model->rcd_id = $request->rcd_id;
                $model->rev_id = $request->rev_id;
                $model->remarks = $request->remarks;
                $model->from_date = now()->toDateTimeString();

                $model->save();


                $saveDocuments = $this->updateStoredDocuments($request, $model->id, $request->doc_id);
                if ($saveDocuments) {
                    DB::commit();

                    $data = [
                    'success' => true,
                    'message' => 'Compliance details updated succesfully'
                ];


                    return response()->json($data, 201);
                } else {
                    DB::rollBack();
                    $data = [
                    'success' => false,
                    'message' => 'An error occured while updating compliance documents'
                ];


                    return response()->json($data, 500);
                }
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Compliance not found'
                ];


                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating compliance details'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CodeCompliances::destroy($id);
            $data = [
                'success' => true,
                'message' => 'Compliance deleted succesfully'
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while deleting compliance'
            ];
            return response()->json($data, 500);
        }
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
     * Store Compliance Documents
     */
    public function storeDocuments(Request $request, $cmp_id)
    {
        try {
            $model = new Documents();
            $model->cmp_id = $cmp_id;
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

    /**
     * Update Compliance Documents
     */
    public function updateStoredDocuments(Request $request, $cmp_id, $id)
    {
        try {
            $fileDecode = base64_decode($request->document);
            $f = finfo_open();
            $extension = finfo_buffer($f, $fileDecode, FILEINFO_EXTENSION);
            $model = Documents::find($id);
            $model->cmp_id = $cmp_id;
            $model->doc_name = $request->document_name;
            $model->archive = 1;
            $model->file_type = $extension;
            $model->content = $request->document; 
            $model->file_size = (int) (strlen(rtrim($request->document, '=')) * 3 / 4);
            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);
            return false;
        }
    }
}
