<?php

namespace App\Http\Controllers;

use App\Models\Actions;
use App\Models\CodeCompliances;
use App\Models\RegulatorVerifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

            $models = RegulatorVerifications::get()->loadMissing('code_compliances', 'user');
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
                'cmp_id' => 'required|integer|exists:rpr_code_compliances,id',
                'action_type' => 'required|string',
                'comments' => 'sometimes|string',
                'action_parent_id' => 'sometimes|integer',
                'password' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            //check user - enter password
            $userPassword = User::where('id', auth()->user()->id)->first()->password;
            $isUser =  Hash::check($request->password, $userPassword) ? true : false;
            if (!$isUser) {
                $data = [
                    'success' => false,
                    'message' => 'Password is incorrect'
                ];
                return response()->json($data, 401);
            }

            DB::beginTransaction();

            $model = new RegulatorVerifications();

            $model->rct_id = $request->rct_id;
            $model->id_users = auth()->user()->id; //logged in user
            $model->cmp_id = $request->cmp_id;
            $model->action_date = now()->toDateTimeString();

            $model->save();

            //if an action is verify/reject - update compliance
            $updateCompliance = $request->action_type != 'comment' || $request->action_type != 'rework' ? $this->updateComplianceVerification($request->action_type, $request->cmp_id) : true;

            $addActions = $updateCompliance ? $this->addActions($request) : false;
            if ($updateCompliance && $addActions) {
                DB::commit();
                //Update Compliance - if its verification and/or added an action succesfully
                $data = [
                    'success' => true,
                    'message' => 'Regulator verification added succesfully'
                ];

                return response()->json($data, 201);
            } else {

                DB::rollBack();
                $data = [
                    'success' => false,
                    'message' => 'An error occured while updating compliance status'
                ];
                return response()->json($data, 500);
            }
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while adding regulator verification'
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
                'cmp_id' => 'required|integer|exists:rpr_code_compliances,id',
                'action_type' => 'required|string',
                'comments' => 'sometimes|string',
                'action_parent_id' => 'sometimes|integer',
                'password' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            //check user - enter password
            $userPassword = User::where('id', auth()->user()->id)->first()->password;
            $isUser =  Hash::check($request->password, $userPassword) ? true : false;
            if (!$isUser) {
                $data = [
                    'success' => false,
                    'message' => 'Password is incorrect'
                ];
                return response()->json($data, 401);
            }

            DB::beginTransaction();

            $model = RegulatorVerifications::find($id);

            if ($model) {
                $model->rct_id = $request->rct_id;
                $model->id_users = auth()->user()->id; //logged in user
                $model->cmp_id = $request->cmp_id;
                $model->action_date = now()->toDateTimeString();

                $model->save();


                //if an action is verify/reject - update compliance
                $updateCompliance = $request->action_type != 'comment' || $request->action_type != 'rework' ?
                    $this->updateComplianceVerification($request->action_type, $request->cmp_id) : true;

                $addActions = $updateCompliance ? $this->addActions($request) : false;
                if ($updateCompliance && $addActions) {
                    DB::commit();
                    //Update Compliance - if its verification and/or added an action succesfully
                    $data = [
                        'success' => true,
                        'message' => 'Regulator verification updated succesfully'
                    ];


                    return response()->json($data, 201);
                } else {
                    DB::rollBack();
                    $data = [
                        'success' => false,
                        'message' => 'An error occured while updating compliance verification'
                    ];
                    return response()->json($data, 500);
                }
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Verification not found'
                ];


                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating regulator verification'
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
     * @param string $action action on the compliance - comment | verify | 
     * @param int $id
     */
    public function updateComplianceVerification($action, $id)
    {
        try {
            $model = CodeCompliances::find($id);

            $model->complied = $action == 'verify' ? 'Y' : 'N'; //Y, N
            $model->reviewed_date = now()->toDateTimeString();
            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);

            return false;
        }
    }

    /**
     * Add Actions
     * @param  \Illuminate\Http\Request  $request
     * @return true|false 
     */
    public function addActions(Request $request)
    {
        try {
            $model = new Actions();

            $org_user = DB::table('rpr_code_compliances')
                ->select('rpr_org_users.id as org_user_id')
                ->leftJoin('rpr_user_codes', 'rpr_code_compliances.rcd_id', '=', 'rpr_user_codes.id')
                ->leftJoin('rpr_org_users', 'rpr_user_codes.rus_id', '=', 'rpr_org_users.id')
                ->where('rpr_code_compliances.id', '=', $request->cmp_id)
                ->first()->org_user_id;

            $findParentAction = Actions::where('cmp_id', '=', $request->cmp_id)
                ->where('action_type', '=', $request->action_type)
                ->whereNull('parent_id')
                ->first();

            $action_parent_id = $findParentAction ? $findParentAction->id : null;

            $model->parent_id = $action_parent_id;
            $model->cmp_id = $request->cmp_id;
            $model->id_user = auth()->user()->id;
            $model->rus_id = $org_user;
            $model->action_type = $request->action_type;
            $model->comment = $request->action_type == 'comment' ? $request->comments : null;
            $model->verify_comment = $request->action_type == 'verify' ? $request->comments : null;
            $model->reject_comment = $request->action_type == 'reject' ? $request->comments : null;
            $model->rework_comment = $request->action_type == 'rework' ? $request->comments : null;
            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);
            return false;
        }
    }
}
