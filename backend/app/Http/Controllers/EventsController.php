<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Organizations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $models = Events::get()->loadMissing('code', 'code_compliances');
            $data = [
                'success' => true,
                'data' => $models
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting events, please try again'
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

                'cds_id' => 'required|integer',
                'event' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'url' => 'sometimes|string|nullable',
                'location' => 'sometimes|string|nullable',
                'color' => 'sometimes|string|nullable',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = new Events();

            $model->cds_id = $request->cds_id;
            $model->event = $request->event;
            $model->start_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_date);
            $model->end_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->end_date);
            $model->url = $request->url ?? null;
            $model->location = $request->location ?? null;
            $model->color = $request->color ?? bin2hex(openssl_random_pseudo_bytes(3));

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Event added succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while adding event'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $model = Events::find($id);

            if ($model) {
                $data = [
                    'success' => true,
                    'data' => $model->loadMissing('code', 'code_compliances')
                ];

                return response()->json($data, 200);
            } else {
                $data = [
                    'success' => false,
                    'data' => $model,
                    'message' => 'The event was not found'
                ];

                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting event, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [

                'cds_id' => 'required|integer',
                'event' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'url' => 'sometimes|string|nullable',
                'location' => 'sometimes|string|nullable',
                'color' => 'sometimes|string|nullable',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = Events::find($id);

            if ($model) {
                $model->cds_id = $request->cds_id;
                $model->event = $request->event;
                $model->start_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_date);
                $model->end_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->end_date);
                $model->url = $request->url ?? null;
                $model->location = $request->location ?? null;
                $model->color = $request->color ?? bin2hex(openssl_random_pseudo_bytes(3));

                $model->save();
                $data = [
                    'success' => true,
                    'message' => 'Event updated succesfully'
                ];
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Event not found'
                ];


                return response()->json($data, 404);
            }

            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating event'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Events::destroy($id);
            $data = [
                'success' => true,
                'message' => 'Event deleted succesfully'
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while deleting event'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Get Organization Events
     */
    public function OrgEvents($org_id)
    {
        try {
            $models = DB::table('rpr_organizations')->leftJoin('rpr_org_codes', 'rpr_organizations.id', '=', 'rpr_org_codes.ror_id')
                ->leftJoin('rpr_codes', 'rpr_org_codes.cds_id', '=', 'rpr_codes.id')
                ->leftJoin('rpr_events', 'rpr_codes.id', '=', 'rpr_events.cds_id')
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
                'message' => 'An error occured while getting events, please try again'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Generate Code Events for an organization
     */
    public function generateOrganizationEvents(Request $request)
    {
        try {
            $rules = [

                'org_id' => 'required|integer',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }


            $modelOrg = DB::table('rpr_organizations')
            ->leftJoin('rpr_org_codes', 'rpr_organizations.id', '=', 'rpr_org_codes.ror_id')
            // ->leftJoin('rpr_')
            ;

        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while generating organization events'
            ];
            return response()->json($data, 500);
        }
    }
}
