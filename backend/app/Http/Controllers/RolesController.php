<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $models = Roles::get()->loadMissing('parent', 'children', 'codes', 'user_roles');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {
            $rules = [

                'parent_id' => 'sometimes|id',
                'cds_id' => 'required|integer',
                'role' => 'required|string',
                // 'start_date' => now()->toDateTimeString(),
                // 'end_date' => null,
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = new Roles();

            $model->parent_id = $request->parent_id ?? null;
            $model->cds_id = $request->cds_id;
            $model->role = $request->role;
            $model->start_date = now()->toDateTimeString();
            $model->end_date = null;

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Role created succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while creating role'
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

            $model = Roles::find($id);

            if ($model) {
                $data = [
                    'success' => true,
                    'data' => $model->loadMissing('parent', 'children', 'codes', 'user_roles')
                ];

                return response()->json($data, 200);
            } else {
                $data = [
                    'success' => false,
                    'data' => $model,
                    'message' => 'The role was not found'
                ];

                return response()->json($data, 404);
            }
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while getting role, please try again'
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

                'parent_id' => 'sometimes|id',
                'cds_id' => 'required|integer',
                'role' => 'required|string',
                'start_date' => now()->toDateTimeString(),
                'end_date' => null,
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'success' => false,
                    'message' => $validator->errors()->first()
                ];
                return response()->json($data, 422);
            }

            $model = Roles::find($id);

            $model->parent_id = $request->parent_id ?? null;
            $model->cds_id = $request->cds_id;
            $model->role = $request->role;
            $model->start_date = now()->toDateTimeString();
            $model->end_date = $request->end_date ?? null;

            $model->save();
            $data = [
                'success' => true,
                'message' => 'Role updated succesfully'
            ];


            return response()->json($data, 201);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while updating role'
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
            Roles::destroy($id);
            $data = [
                'success' => true,
                'message' => 'Role deleted succesfully'
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);
            $data = [
                'success' => false,
                'message' => 'An error occured while deleting role'
            ];
            return response()->json($data, 500);
        }
    }
}
