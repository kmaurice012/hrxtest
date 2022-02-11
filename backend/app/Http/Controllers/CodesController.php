<?php

namespace App\Http\Controllers;

use App\Models\CodeDetails;
use App\Models\Codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $models = Codes::get()->loadMissing('frequency', 'code_details', 'events', 'org_codes');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting codes, please try again'
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

                'fr_id' => 'required|integer',
                'code' => 'required|string',
                'serial_number' => 'required|string',
                'description' => 'required|string',
                'color_code' => 'sometimes|string',
                'code_details_parent_id' => 'sometimes|integer',
                'code_details' => 'sometimes|string'
            ];
            $messages = [
                'fr_id.required' => 'Please choose a frequency',
                'fr_id.integer' => 'The frequency id should be a number/integer',
                'code.required' => 'Please enter a code name',
                'code.string' => 'The color code should be in characters',
                'serial_number.required' => 'Please enter serial number',
                'serial_number.string' => 'The color code should be in characters',
                'description,required' => 'Please enter a description',
                'description.string' => 'The color code should be in characters',
                'color_code.string' => 'The color code should be in characters',
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
            $model = new Codes();

            $model->fr_id = $request->fr_id;
            $model->code = $request->code;
            $model->serial_number = $request->serial_number;
            $model->description = $request->description;
            $model->color_code = $request->code ?? null;

            $model->save();

            if ($model) {

                //add code details
                $assignCode = $request->code_details ? $this->addCodeDetails($request, $model->id) : true;

                // $model->org_codes()->save($model, ['cds_id' => $request->code, 'start_date' =>now()->toDateTimeString()]);
                if ($assignCode) {

                    DB::commit();
                    $data = [
                        'success' => true,
                        'message' => 'Code created succesfully'
                    ];


                    return response()->json($data, 201);
                } else {
                    DB::rollBack();

                    $data = [
                        'success' => false,
                        'message' => 'An error occured while adding code details'
                    ];


                    return response()->json($data, 500);
                }
            }
        } catch (\Throwable $th) {
           logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while creating code'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function show($codes)
    {
        try {

            $models = Codes::find($codes)->loadMissing('frequency', 'code_details',  'events', 'org_codes');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting codes, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        try {
            $rules = [

                'fr_id' => 'required|integer',
                'code' => 'required|string',
                'serial_number' => 'required|string',
                'description' => 'required|string',
                'color_code' => 'sometimes|string',
                'code_details_parent_id' => 'sometimes|integer',
                'code_details' => 'sometimes|string',
                'code_details_id' => 'required|string'
            ];


            $messages = [
                'fr_id.required' => 'Please choose a frequency',
                'fr_id.integer' => 'The frequency id should be a number/integer',
                'code.required' => 'Please enter a code name',
                'code.string' => 'The code name should be in characters',
                'serial_number.required' => 'Please enter serial number',
                'serial_number.string' => 'The serial_number should be in characters',
                'description,required' => 'Please enter a description',
                'description.string' => 'The description should be in characters',
                'color_code.string' => 'The color code should be in characters',
                'code_details_parent_id' => 'Parent id should be a number',
                'code_details' => 'Code details should be in characters',
                'code_details_id' => 'Code id should be a number',
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
            $model = Codes::find($code);

            $model->fr_id = $request->fr_id;
            $model->code = $request->code;
            $model->serial_number = $request->serial_number;
            $model->description = $request->description;
            $model->color_code = $request->color_code ?? null;

            $model->save();

            if ($model) {

                //add code details
                $assignCode = $request->code_details ? $this->updateCodeDetails($request, $model->id, $request->code_details_id) : true;

                // $model->org_codes()->save($model, ['cds_id' => $request->code, 'start_date' =>now()->toDateTimeString()]);
                if ($assignCode) {

                    DB::commit();
                    $data = [
                        'success' => true,
                        'message' => 'Code updated succesfully'
                    ];


                    return response()->json($data, 201);
                } else {
                    DB::rollBack();

                    $data = [
                        'success' => false,
                        'message' => 'An error occured while updating code details'
                    ];


                    return response()->json($data, 500);
                }
            }
        } catch (\Throwable $th) {
           logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating code'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        try {
            Codes::destroy($code);
            $data = [
                'success' => true,
                'message' => 'Code deleted succesfully'
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while deleting code'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Add code details
     */
    public function addCodeDetails(Request $request, $code)
    {
        try {
            $model = new CodeDetails();
            $model->cds_id = $code;
            $model->parent_id = $request->code_details_parent_id ?? null;
            $model->details = $request->code_details;

            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);

            return false;
        }
    }

    /**
     * Add code details
     */
    public function updateCodeDetails(Request $request, $code, $code_details)
    {
        try {
            $model = CodeDetails::find($code_details);
            $model->cds_id = $code;
            $model->parent_id = $request->code_details_parent_id ?? null;
            $model->details = $request->code_details;

            $model->save();

            return true;
        } catch (\Throwable $th) {
            logger($th);

            return false;
        }
    }
}
