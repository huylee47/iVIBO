<?php

namespace App\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService {
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $account = User::where('username', $username)->first();
        if(!$account){
            return response()->json(['message' => 'Account not found'], 404);
        }
        if(!Hash::check($password, $account->password)){
            return response()->json(['message' => 'Password is incorrect'], 401);
        }
        Auth::login($account);
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        if($user->role_id == 1){
                $token = $account->createToken('authToken', ['admin'])->plainTextToken; 
                return 
                [
                    'success' => true, 
                    'token' => $token, 
                    'role' => 'admin',
                    'name' => $user->name
                ];
        }else{
                $token = $account->createToken('authToken', ['user'])->plainTextToken; 
                return 
                [
                    'success' => true, 
                    'token' => $token, 
                    'role' => 'user',
                    'name' => $user->name
                ];
        }
       
    }
}