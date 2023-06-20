<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Add;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "phone"    => 'required',
                "password" => 'required|string',
            ]);

            if ($validator->fails()) {
                $errors = "";

                foreach ($validator->errors()->all() as $message) {
                    $errors .= $message;
                }
                return response()->json(['data' => [], 'message' => $errors, 'success' => false, 'status' => 406], 200);
            }

            $credentials = ['phone' => $request->phone, 'password' => $request->password];

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['data' => [], 'message' => 'Invalid Login Information!', 'success' => false, 'status' => 406], 200);
            } else {
                $users = [];
                // authenticate request
                $user = User::with(['role_name', 'company_name'])->find(Auth::user()->id);
                if ($user->role == 2) {
                    $users = User::with(['role_name', 'company_name'])->where('company_id', $user->company_id)->get();
                }

                $data = [
                    'user' => $user,
                    'users' => $users,
                    'authorisation' => $token
                ];
                return response()->json(['data' => $data, 'message' => null, 'success' => true, 'status' => 200], 200);
            }
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }

    public function activity()
    {
        try {
            $activity = Activity::orderBy('name', 'ASC')->get();
            $activities =[];
            foreach($activity as $item){
                $permission = Permission::where('activity_id',$item->id)->where('user_id',Auth()->user()->id)->first();
                $activities[]=[
                    'name'=>$item->name,
                    'permission'=>($permission!=null)?1:0
                ];
            }
            return response()->json(['data' => $activities, 'message' => null, 'success' => true, 'status' => 200], 200);
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }
    public function add_permission(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "activity_id"    => 'required',
                'user_id' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = "";

                foreach ($validator->errors()->all() as $message) {
                    $errors .= $message;
                }
                return response()->json(['data' => [], 'message' => $errors, 'success' => false, 'status' => 406], 200);
            }
            $permissions = new Permission;
            $permissions->user_id = $request->user_id;
            $permissions->activity_id = $request->activity_id;
            $permissions->save();
            return response()->json(['data' => [], 'message' => 'Permission Add Successfully!', 'success' => true, 'status' => 200], 200);
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }
    public function permissions($id)
    {
        try {
            $permissions = Permission::with(['user_name', 'activity_name'])->where('user_id', $id)->get();
            return response()->json(['data' => $permissions, 'message' => null, 'success' => true, 'status' => 200], 200);
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }
    public function delete_permission(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "activity_id"    => 'required',
                'user_id' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = "";

                foreach ($validator->errors()->all() as $message) {
                    $errors .= $message;
                }
                return response()->json(['data' => [], 'message' => $errors, 'success' => false, 'status' => 406], 200);
            }
            $permission = Permission::where('user_id', $request->user_id)->where('activity_id', $request->activity_id)->first();
            if (isset($permission)) {
                $permission->delete();
                return response()->json(['data' => [], 'message' => 'Permission Delete Successfully!', 'success' => true, 'status' => 200], 200);
            } else {
                return response()->json(['data' => [], 'message' => 'Not Found!', 'success' => false, 'status' => 406], 200);
            }
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }

    public function update_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = "";

                foreach ($validator->errors()->all() as $message) {
                    $errors .= $message;
                }
                return response()->json(['data' => [], 'message' => $errors, 'success' => false, 'status' => 406], 200);
            }
            $user = User::find(Auth()->user()->id);
            if (isset($user)) {
                $user->password = Hash::make($request->password);
                $user->update();
                return response()->json(['data' => [], 'message' => 'Password Update Successfully!', 'success' => true, 'status' => 200], 200);
            } else {
                return response()->json(['data' => [], 'message' => 'Not Found!', 'success' => false, 'status' => 406], 200);
            }
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }
    public function adds()
    {
        try {
            $adds = Add::get();
            return response()->json(['data' => $adds, 'message' => null, 'success' => true, 'status' => 200], 200);
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }
    // Forget Password
    public function forget_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = "";

                foreach ($validator->errors()->all() as $message) {
                    $errors .= $message;
                }
                return response()->json(['data' => [], 'message' => $errors, 'success' => false, 'status' => 406], 200);
            }
            $user = User::where('phone', $request->phone)->first();
            if (isset($user)) {
                // Available alpha caracters
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(100, 999)
                    . $characters[rand(0, strlen($characters) - 1)]
                    . mt_rand(100, 999);

                // shuffle the result
                $code = str_shuffle($pin);
                $user->password = Hash::make($code);
                $user->update();
                return response()->json(['data' => $code, 'message' => 'Password Update Successfully!', 'success' => true, 'status' => 200], 200);
            } else {
                return response()->json(['data' => [], 'message' => 'Phone Not Found!', 'success' => false, 'status' => 406], 200);
            }
        } catch (Exception $e) {
            return response()->json(['data' => [], 'message' => $e->getMessage(), 'success' => false, 'status' => 500], 200);
        }
    }
}
