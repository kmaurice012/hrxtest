<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use Illuminate\Http\Request;

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

            $model = Organizations::with('bonusType')->find($organization);
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
     * @param  \App\Models\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizations $organizations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizations $organizations)
    {
        //
    }
}
