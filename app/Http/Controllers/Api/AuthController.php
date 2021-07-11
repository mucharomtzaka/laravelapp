<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
  //register auth
  public function register(Request $request){
        $validate = \Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'name' => 'required'
        ]);
        //check validate
        if($validate->fails()){
          $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
          return response()->json($respon, 200);
        }
        
        // check user email exist register
        $usercheck = User::where('email', $request->email)->first();
       
        
            
         //store input for register new user
        $user = User::create([
            'name' => $request['name'],
            'password' => \Hash::make($request['password']),
            'email' => $request['email'],
            'status' => 'aktif'
        ]);
        
        $tokenResult = $user->createToken('token-auth')->plainTextToken;
            $respon = [
                'status' => 'success',
                'msg' => 'Register successfully',
                'errors' => null,
                'content' => [
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ];
        
        return response()->json($respon, 200);
    
  }
  //login auth
  public function login(Request $request) {
        $validate = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        //dd($request->all());

        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {
            $credentials = request(['email', 'password']);
            $credentials = Arr::add($credentials, 'status', 'aktif');
            if (!Auth::attempt($credentials)) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'Unathorized',
                    'errors' => null,
                    'content' => null,
                ];
                return response()->json($respon, 401);
            }

            $user = User::where('email', $request->email)->first();
            if (! \Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }

            $tokenResult = $user->createToken('token-auth')->plainTextToken;
            $respon = [
                'status' => 'success',
                'msg' => 'Login successfully',
                'errors' => null,
                'content' => [
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ];
            return response()->json($respon, 200);
        }
    }
   
  
  // logout session one user 
  public function logout(Request $request) {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $respon = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($respon, 200);
    }
    
  // logoutall session
  public function logoutall(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        $respon = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($respon, 200);
    }
    
    /**
     * get info profil
    **/
    public function profilUser(Request $request){
        $user = $request->user();
        $profil = [
          'name' => $user['name'],
          'email'=> $user['email'],
          'status'=> $user['status'],
          'account_type' => $user['type_account']
          ];
        $respon = [
            'status' => 'success',
            'msg' => 'Information profil',
            'data' => $profil
        ];
        return response()->json($respon, 200);
    }
}
