<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'national_id' => ['required', 'integer', 'min:0'],
            'job' => ['required', 'string', 'min:5'],
            'floor' => ['required', 'integer', 'min:0'],
            'building' => ['required', 'integer', 'min:0'],
            'street' => ['required', 'string'],
            'area' => ['required', 'string'],
            'city' => ['required', 'string'],
        ]);

        if($request->email=="example@com"){
        $user = new User([
            'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'national_id' => $request->national_id,
                'job' => $request->job,
                'floor' => $request->floor,
                'building' => $request->building,
                'street' => $request->street,
                'area' => $request->area,
                'city' => $request->city
        ]);
        }
        else{
            $user = new User([
            'email' => $request->email,
            'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'national_id' => $request->national_id,
                'job' => $request->job,
                'floor' => $request->floor,
                'building' => $request->building,
                'street' => $request->street,
                'area' => $request->area,
                'city' => $request->city
        ]);
        }


        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request){
        return response()->json($request->user());
    }
}
