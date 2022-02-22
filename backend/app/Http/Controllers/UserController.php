<?php

namespace App\Http\Controllers;

use App\Models\OrgUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * User Login
     * @bodyParam username string the username.
     * @bodyParam passowrd string the user password.
     */
    public function login(Request $request)
    {
        try {

            $admin = User::where('username', '=', $request->username)->first();
            $user = OrgUsers::where('username', '=', $request->username)->first();

            $admin = $admin ? Hash::check($request->password, $admin->password) : false;
            $user = $user ?  Hash::check($request->password, $user->password) : false;

            if ($admin) {
                $user = User::where('username', '=', $request->username)->first();
                Auth::login($user);
                $token = $user->createToken('auth_token')->plainTextToken;

                // response
                $response = [
                    'success' => true,
                    'message' => 'User login successfully',
                    'token' => [
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                    ],
                    'user' => $user,
                    'role' => 'admin'
                ];
                return response()->json($response, 200);
            } elseif ($user) {
                $user = OrgUsers::where('username', '=', $request->username)->first();
                Auth::login($user);
                $token = $user->createToken('auth_token')->plainTextToken;

                // response
                $response = [
                    'success' => true,
                    'message' => 'User login successfully',
                    'token' => [
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                    ],
                    'user' => $user,
                    'role' => 'user'
                ];


                return response()->json($response, 200);
            } else {

                $response = [
                    'success' => false,
                    'message' => 'Incorrect Username or Password'
                ];
                return response()->json($response, 404);
            }
        } catch (\Throwable $th) {
            logger($th);

            $response = [
                'success' => false,
                'message' => "An error occured while trying to login, please try again"
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Logout a user
     */
    public function logout(Request $request)
    {

        try {
            $request->user()->currentAccessToken()->delete();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
