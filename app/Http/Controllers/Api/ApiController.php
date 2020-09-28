<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
 
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }
}