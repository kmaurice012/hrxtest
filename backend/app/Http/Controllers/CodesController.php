<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use Illuminate\Http\Request;

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
        //
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

            $models = Codes::with('frequency', 'code_details',  'events', 'org_codes')->find($codes);
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
    public function update(Request $request, Codes $codes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codes $codes)
    {
        //
    }
}
