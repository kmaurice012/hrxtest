<?php

namespace App\Http\Controllers;

use App\Models\CodeCompliances;
use App\Models\RegulatorVerifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegulatorVerificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $models = RegulatorVerifications::get()->loadMissing('events', 'user_codes', 'documents');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting verifications, please try again'
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
                'rct_id' => 'required|integer',
                'id_users' => 'required|integer',
                'cmp_id' => 'required|integer',
                'comments' => 'required|string',
                'compliance' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = new RegulatorVerifications();

            $model->rct_id = $request->rct_id;
            $model->id_users = $request->id_users;
            $model->cmp_id = $request->cmp_id;
            $model->comments = $request->comments;
            $model->action_date = now()->toDateTimeString();

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Verification added succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while adding verification'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegulatorVerifications  $RegulatorVerifications
     * @return \Illuminate\Http\Response
     */
    public function show(RegulatorVerifications $RegulatorVerifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegulatorVerifications  $RegulatorVerifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'rct_id' => 'required|integer',
                'id_users' => 'required|integer',
                'cmp_id' => 'required|integer',
                'comments' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = RegulatorVerifications::find($id);

            $model->rct_id = $request->rct_id;
            $model->id_users = $request->id_users;
            $model->cmp_id = $request->cmp_id;
            $model->comments = $request->comments;
            $model->action_date = now()->toDateTimeString();

            $model->save();


            $updateCompliance = $this->updateComplianceVerification($request->compliance, $request->cmp_id);

            if ($updateCompliance ) {
                # code...
            } else {
                # code...
            }
            
            $data = [
                'success' => true,
                'message' => 'Verification updated succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating verification'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegulatorVerifications  $RegulatorVerifications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update Compliance Verification
     */
    public function updateComplianceVerification($compliance, $id)
    {
        try {
            $model = CodeCompliances::find($id);

            $model->complied = $compliance;
            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);

            return false;
        }
    }
}
