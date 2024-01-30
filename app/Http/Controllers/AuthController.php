<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required',
        ]);

        $email = $request->get('email');

        $user = User::where('email',$email)->first();
        if(!$user || !Hash::check($request->get('password'),$user->password,[])){
            return response()->json([
                'message'=>'Login failed',
                'status'=> 400,
            ]);
        }

        $token=  $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'token'=>$token,
            'email' => $user->email,
            'message'=>'Login successful',
            'status'=>200,
        ]);
    }

    public function logout(){
//         // Revoke all tokens...
// $user->tokens()->delete();
 
// // Revoke the token that was used to authenticate the current request...
// $request->user()->currentAccessToken()->delete();
 
// // Revoke a specific token...
// $user->tokens()->where('id', $tokenId)->delete();
        auth()->user()->currentAccessToken()->delete();

        return response()->json([
            'message'=>'Logout successful',
            'status'=>200,
        ]);
    }

    public function register(Request $request){
        // $message = [
        //     'name.required' => 'tên không được để trống',

        //     'email.email'=> 'email không hợp lệ',
        //     'email.required' =>'email không được để trống',
            
        //     'password' =>'Password không được để trống',
        // ];
      
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'message'=>$validate->errors(),
                'status'=> 400,
            ]);
        }
        $user = new User();
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->password =Hash::make( $request->get('password'));
        if($user->save()){
            return response()->json([
                'data'=>$user->toArray(),
                'message'=>'Register successfully',
                'status'=> 200,
            ]);
        }else{
            return response()->json([
                'message'=>'Register Fail',
                'status'=> 400,
            ]);
        }

    }

    public function user(){
        $user = User::find(auth()->user()->id) ;
        if($user){
            return response()->json([
                'data'=>$user->toArray(),
                'status'=> 200,
            ]);
        }else{
            return response()->json([
                'message'=>'token invail',
                'status'=> 400,
            ]);
        }
       
    }

    public function checktoken(Request $request){

        return response()->json([
            'message'=>'Token is valid',
            'status'=> 200,
        ]);
    }
}
