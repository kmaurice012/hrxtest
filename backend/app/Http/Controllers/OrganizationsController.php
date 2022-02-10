<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use App\Models\OrgCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $models = Organizations::get()->loadMissing('org_codes', 'org_users');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting organizations, please try again'
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
                'organization_name' => 'required|string',
                'primary_color' => 'sometimes|string',
                'secondary_color1' => 'sometimes|string',
                'secondary_color2' => 'sometimes|string',
                'secondary_color3' => 'sometimes|string',
                'code' => 'required|integer'
            ];
            $messages = [
                'organization_name.required' => 'Please enter Organization name',
                'organization_name.required' => 'Organization name should be in characters',
                'primary_color.string' => 'Primary color should be in characters',
                'secondary_color1.string' => 'Primary color should be in characters',
                'secondary_color2.string' => 'Secondary color should be in characters',
                'secondary_color3.string' => 'Secondary color should be in characters',
                'code.required' => 'Please select at least one code',
                'code.integer' => 'Code id must be an integer'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            DB::beginTransaction();
            $model = new Organizations();

            $model->organization_name = $request->organization_name;
            $model->primary_color = $request->primary_color;
            $model->secondary_color1 = 'test';
            $model->secondary_color2 = 'test';
            $model->secondary_color3 = 'test';

            $model->save();

            if ($model) {

                //add code
                $assignCode = $this->assignCode($request, $model->id);

                // $model->org_codes()->save($model, ['cds_id' => $request->code, 'start_date' =>now()->toDateTimeString()]);
                if ($assignCode) {

                    DB::commit();
                    $data = [
                        'success' => true,
                        'message' => 'Organization created succesfully'
                    ];


                    return response()->json($data, 201);
                } else {
                    DB::rollBack();

                    $data = [
                        'success' => false,
                        'message' => 'An error occured while adding code to organization'
                    ];


                    return response()->json($data, 500);
                }
            }
        } catch (\Throwable $th) {
            throw $th;

            $data = [
                'success' => false,
                'message' => 'An error occured while creating organization'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function show($organization)
    {
        try {

            $model = Organizations::find($organization)->loadMissing('org_codes', 'org_users');
            if ($model) {
                $data = [
                    'success' => true,
                    'data' => $model
                ];

                return response()->json($data, 200);
            } else {
                $data = [
                    'success' => false,
                    'data' => $model,
                    'message' => 'The organization was not found'
                ];

                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting organization, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $organization)
    {
        try {
            $rules = [
                'organization_name' => 'required|string',
                'primary_color' => 'sometimes|string',
                'secondary_color1' => 'sometimes|string',
                'secondary_color2' => 'sometimes|string',
                'secondary_color3' => 'sometimes|string',
                'code' => 'required|integer',
                'org_code' => 'required|integer'
            ];
            $messages = [
                'organization_name.required' => 'Please enter Organization name',
                'organization_name.required' => 'Organization name should be in characters',
                'primary_color.string' => 'Primary color should be in characters',
                'secondary_color1.string' => 'Primary color should be in characters',
                'secondary_color2.string' => 'Secondary color should be in characters',
                'secondary_color3.string' => 'Secondary color should be in characters',
                'code.required' => 'Please select at least one code',
                'code.integer' => 'Code id must be an integer',
                'org_code.required' => 'Please select at least one code',
                'org_code.integer' => 'Code id must be an integer'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            DB::beginTransaction();
            $model = Organizations::find($organization);

            $model->organization_name = $request->organization_name;
            $model->primary_color = $request->primary_color;
            $model->secondary_color1 = 'test';
            $model->secondary_color2 = 'test';
            $model->secondary_color3 = 'test';

            $model->save();

            if ($model) {

                //add code
                $updateCode = $this->updateCode($request, $model->id, $request->org_code);

                // $model->org_codes()->save($model, ['cds_id' => $request->code, 'start_date' =>now()->toDateTimeString()]);
                if ($updateCode) {

                    DB::commit();
                    $data = [
                        'success' => true,
                        'message' => 'Organization updated succesfully'
                    ];


                    return response()->json($data, 201);
                }
                else {
                    DB::rollBack();

                    $data = [
                        'success' => false,
                        'message' => 'An error occured while updating code to organization'
                    ];


                    return response()->json($data, 201);
                }
            }
        } catch (\Throwable $th) {
            throw $th;

            $data = [
                'success' => false,
                'message' => 'An error occured while updating organization'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id $organizations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizations $organization)
    {
        try {

            Organizations::destroy($organization);

            $data = [
                'success' => true,
                'message' => 'Organization deleted succesfully'
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while deleting organization'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Assign Organization Code
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $organization
     * @return bool
     */
    public function assignCode(Request $request, $organization)
    {
        try {

            $model = new OrgCodes();

            $model->cds_id = $request->code;
            $model->ror_id =  $organization;
            $model->start_date = now()->toDateTimeString();
            $model->save();
            return true;
        } catch (\Throwable $th) {
            throw ($th);

            return false;
        }
    }

    /**
     * Update Organization Code
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $organization
     * @param  int  $orgCode
     * @return bool
     */
    public function updateCode(Request $request, $organization, $orgCode)
    {
        try {

            $model = OrgCodes::find($orgCode);

            $model->cds_id = $request->code;
            $model->ror_id = $organization;
            $model->start_date = now()->toDateTimeString();
            $model->save();
            return true;
        } catch (\Throwable $th) {
            logger($th);

            return false;
        }
    }
}
