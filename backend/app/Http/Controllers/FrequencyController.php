<?php

namespace App\Http\Controllers;

use App\Models\CodesFrequency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $models = CodesFrequency::get()->loadMissing('codes');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);

            $data = [
                'success' => false,
                'message' => 'An error occured while getting code frequencies, please try again'
            ];
            return response()->json($data, 500);
        } catch (\Throwable $th) {
            logger($th);
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
                'frequency' => 'required|string',
                'unit' => 'required|string',
                'qty' => 'required|integer',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = new CodesFrequency();

            $model->frequency = $request->frequency;
            $model->unit = $request->unit;
            $model->qty = $request->qty;

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Frequency created succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while creating frequency'
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

            $models = CodesFrequency::find($id)->loadMissing('codes');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting code frequencies, please try again'
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
                'frequency' => 'required|string',
                'unit' => 'required|string',
                'qty' => 'required|integer',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = CodesFrequency::find($id);

            $model->frequency = $request->frequency;
            $model->unit = $request->unit;
            $model->qty = $request->qty;

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Frequency updated succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating frequency'
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
            CodesFrequency::destroy($id);
            $data = [
                'success' => true,
                'message' => 'Frequency deleted succesfully'
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while deleting frequency'
            ];
            return response()->json($data, 500);
        }
    }
}
