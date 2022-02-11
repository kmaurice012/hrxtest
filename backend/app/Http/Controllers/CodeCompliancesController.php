<?php

namespace App\Http\Controllers;

use App\Models\CodeCompliances;
use Illuminate\Http\Request;
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
                'rev_id' => 'required|integer',
                // 'complied' => 'required|string',
                'remarks' => 'sometimes|string',

                // 'reviewed_date' => now()->toDateTimeString(),
                // 'from_date' => now()->toDateTimeString(),
                // 'end_date' => now()->addDecade()->toDateTimeString(),

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = new CodeCompliances();

            $model->rev_id = $request->rev_id ?? null;
            $model->remarks = $request->cds_id;
            $model->reviewed_date = $request->role;
            $model->from_date = now()->toDateTimeString();

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Compliance submitted succesfully'
            ];


            return response()->json($data, 201);
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

            $models = CodeCompliances::find($id)->loadMissing('events', 'user_codes', 'documents');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
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

            $models = CodeCompliances::leftJoin('user_codes', 'code_compliances.rcd_id', '=', 'user_codes.id')
                ->leftJoin('org_users', 'user_codes.rus_id', '=', 'org_users.id')
                ->leftJoin('organizations', 'user_codes.ror_id', '=', 'organizations.id')
                ->where('organizations.id', $request->org_id)->get()->loadmissing('documents');

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
}
