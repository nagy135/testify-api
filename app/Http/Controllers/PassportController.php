<?php


namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        return response()->json(['message' => 'Successfully registered user'], 201);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken($request->login)->accessToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'User was successfully logged out'
        ]);
    }
}
