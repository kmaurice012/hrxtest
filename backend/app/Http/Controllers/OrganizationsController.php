<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use App\Models\Organizations;
use App\Models\OrgCodes;
use App\Models\Periods;
use Carbon\Carbon;
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

            $models = Organizations::get()->loadMissing('org_codes', 'org_users', 'periods');
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
                'code_id' => 'required|integer',
                'oty_id' => 'required|integer',
                'period_name' => 'required|string',
                'period_start_date' => 'required|date',
                'period_end_date' => 'required|date',

            ];
            $messages = [
                'organization_name.required' => 'Please enter Organization name',
                'organization_name.required' => 'Organization name should be in characters',
                'primary_color.string' => 'Primary color should be in characters',
                'secondary_color1.string' => 'Primary color should be in characters',
                'secondary_color2.string' => 'Secondary color should be in characters',
                'secondary_color3.string' => 'Secondary color should be in characters',
                'code_id.required' => 'Please select at least one code',
                'code_id.integer' => 'Code id must be an integer'
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

            $model->oty_id = $request->oty_id;
            $model->organization_name = $request->organization_name;
            $model->primary_color = $request->primary_color;
            $model->secondary_color1 = $request->secondary_color1 ?? null;
            $model->secondary_color2 = $request->secondary_color1 ?? null;
            $model->secondary_color3 = $request->secondary_color1 ?? null;

            $model->save();

            if ($model) {

                //add organization period eg financial year etc
                $addPeriod = $this->addPeriods($request, $model->id);

                if ($addPeriod) {

                    //add code - organization codes
                    $assignCode = $this->assignCode($request, $model->id, $addPeriod->id);

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
                            'message' => 'An error occured while adding organization code'
                        ];


                        return response()->json($data, 500);
                    }
                } else {
                    DB::rollBack();

                    $data = [
                        'success' => false,
                        'message' => 'An error occured while adding organization periods'
                    ];


                    return response()->json($data, 500);
                }

                // $model->org_codes()->save($model, ['cds_id' => $request->code, 'start_date' =>now()->toDateTimeString()]);


            }
        } catch (\Throwable $th) {
            logger($th);

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
    public function show($id)
    {
        try {

            $model = Organizations::find($id);
            if ($model) {
                $data = [
                    'success' => true,
                    'data' => $model->loadMissing('org_codes', 'org_users', 'periods')
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'organization_name' => 'required|string',
                'primary_color' => 'sometimes|string',
                'secondary_color1' => 'sometimes|string',
                'secondary_color2' => 'sometimes|string',
                'secondary_color3' => 'sometimes|string',
                'code_id' => 'required|integer',
                'org_code_id' => 'required|integer',
                'oty_id' => 'required|integer',
                'period_id' => 'required|integer',
                'period_name' => 'required|string',
                'period_start_date' => 'required|date',
                'period_end_date' => 'required|date',
            ];
            $messages = [
                'organization_name.required' => 'Please enter Organization name',
                'organization_name.required' => 'Organization name should be in characters',
                'primary_color.string' => 'Primary color should be in characters',
                'secondary_color1.string' => 'Primary color should be in characters',
                'secondary_color2.string' => 'Secondary color should be in characters',
                'secondary_color3.string' => 'Secondary color should be in characters',
                'code_id.required' => 'Please select at least one code',
                'code_id.integer' => 'Code id must be an integer',
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
            $model = Organizations::find($id);
            if ($model) {

                $model->oty_id = $request->oty_id;
                $model->organization_name = $request->organization_name;
                $model->primary_color = $request->primary_color;
                $model->secondary_color1 = $request->secondary_color1 ?? null;
                $model->secondary_color2 = $request->secondary_color1 ?? null;
                $model->secondary_color3 = $request->secondary_color1 ?? null;

                $model->save();

                if ($model) {

                    //add organization period eg financial year etc
                    $addPeriod = $this->updatePeriods($request, $request->period_id, $model->id);

                    if ($addPeriod) {
                        //add code - organization codes
                        $updateCode = $this->updateCode($request, $model->id, $request->org_code_id, $addPeriod->id);

                        // $model->org_codes()->save($model, ['cds_id' => $request->code, 'start_date' =>now()->toDateTimeString()]);
                        if ($updateCode) {

                            DB::commit();
                            $data = [
                                'success' => true,
                                'message' => 'Organization updated succesfully'
                            ];


                            return response()->json($data, 201);
                        } else {
                            DB::rollBack();

                            $data = [
                                'success' => false,
                                'message' => 'An error occured while updating organization code'
                            ];


                            return response()->json($data, 201);
                        }
                    } else {
                        DB::rollBack();

                        $data = [
                            'success' => false,
                            'message' => 'An error occured while updating organization period'
                        ];


                        return response()->json($data, 201);
                    }
                }
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Organization not found'
                ];


                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);

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
    public function destroy($id)
    {
        try {

            Organizations::destroy($id);

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
     * @param  int  $organization_id Organization ID
     * @param  int  $period_id Period ID
     * @return bool
     */
    public function assignCode(Request $request, $organization_id, $period_id)
    {
        try {

            $model = new OrgCodes();

            $codes = Codes::find($request->code_id);

            if ($codes->due_date) {
                //if the code has a due date - use code due date
                $model->due_date = $codes->due_date;
            } else {
                //calculate due date using organization period end date and the code's offset days
                if ($codes->hours_offset) {
                    $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addHours($codes->hours_offset);
                } elseif ($codes->days_offset) {
                    $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addDays($codes->days_offset);
                } elseif ($codes->weeks_offset) {
                    $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addWeeks($codes->weeks_offset);
                } elseif ($codes->months_offset) {
                    $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addMonths($codes->months_offset);
                } elseif ($codes->years_offset) {
                    $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addYears($codes->years_offset);
                }
            }
            $model->cds_id = $request->code_id;
            $model->ror_id =  $organization_id;
            $model->prd_id =  $period_id;
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
     * @param  int  $organization_id Organization ID
     * @param  int  $org_code_id Organization-Code ID to update
     * @param  int  $period_id Period ID
     * @return bool
     */
    public function updateCode(Request $request, $organization_id, $org_code_id, $period_id)
    {
        try {

            $model = OrgCodes::find($org_code_id);

            $codes = Codes::find($request->code_id);
            if ($codes) {

                if ($codes->due_date) {
                    //if the code has a due date - use code due date
                    $model->due_date = $codes->due_date;
                } else {
                    //calculate due date using organization period end date and the code's offset days
                    if ($codes->hours_offset) {
                        $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addHours($codes->hours_offset);
                    } elseif ($codes->days_offset) {
                        $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addDays($codes->days_offset);
                    } elseif ($codes->weeks_offset) {
                        $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addWeeks($codes->weeks_offset);
                    } elseif ($codes->months_offset) {
                        $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addMonths($codes->months_offset);
                    } elseif ($codes->years_offset) {
                        $model->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->period_end_date)->addYears($codes->years_offset);
                    }
                }

                $model->cds_id = $request->code_id;
                $model->ror_id = $organization_id;
                $model->prd_id =  $period_id;
                $model->start_date = now()->toDateTimeString();
                $model->save();
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            logger($th);
            return false;
        }
    }

    /**
     * Add Organization periods
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $organization_id Organization ID
     * 
     */
    public function addPeriods(Request $request, $organization_id)
    {
        try {
            $model = new Periods();

            $model->ror_id = $organization_id;
            $model->period_name = $request->period_name;
            $model->period_start_date = $request->period_start_date;
            $model->period_end_date = $request->period_end_date;
            $model->save();
            return $model;
        } catch (\Throwable $th) {
            logger($th);
            return false;
        }
    }

    /**
     * Update Organization's period
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $period_id Period ID to update
     * @param  int  $organization_id Organization ID
     */
    public function updatePeriods(Request $request, $period_id, $organization_id)
    {
        try {
            $model = Periods::find($period_id);
            if ($model) {

                $model->ror_id = $organization_id;
                $model->period_name = $request->period_name;
                $model->period_start_date = $request->period_start_date;
                $model->period_end_date = $request->period_end_date;
                $model->save();
                return $model;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            logger($th);
            return false;
        }
    }

    /**
     * Get Organization Codes
     * @param int $org_id
     * @return \Illuminate\Http\Response
     */
    public function getOrganizationCodes($org_id)
    {
        try {
            $models = DB::table('rpr_organizations')
                ->select(
                    'rpr_codes.description',
                    'rpr_codes.code',
                    'rpr_codes_frequency.frequency',
                    'rpr_codes.serial_number',
                    'rpr_org_codes.due_date',
                    )
                ->leftJoin('rpr_org_codes', 'rpr_organizations.id', '=', 'rpr_org_codes.ror_id')
                ->leftJoin('rpr_codes', 'rpr_org_codes.cds_id', '=', 'rpr_codes.id')
                ->leftJoin('rpr_codes_frequency', 'rpr_codes.fr_id', '=', 'rpr_codes_frequency.id')
                ->where('rpr_organizations.id', '=', $org_id)
                ->get();

            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while getting organization codes'
            ];
            return response()->json($data, 500);
        }
    }
}
