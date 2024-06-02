<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\RegisterRequest;
use App\Http\Requests\user\UpdateRequest;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'registration', 'update']]);
    }


    public function registration(RegisterRequest $data) {
        return User::firstOrCreate([
            'email' => $data['email'],
        ], [
            'name'    => $data['name'],
            'surname' => $data['surname'],
            'email'   => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(UpdateRequest $data) {

        $user = User::find($data['id']);

        $examination = Hash::check($data['password_old'], $user['password']);

        if ($examination) {
            if ($data['password'] == '********') {
                $user->update([
                    'name'     => $data['name'],
                    'surname'  => $data['surname'],
                ]);
            } else {
                $user->update([
                    'name'     => $data['name'],
                    'surname'  => $data['surname'],
                    'password' => $data['password'],
                ]);
            }

            return response()->json([
                'status' => 200,
                'user' => User::find($data['id']),
            ]);
        } else {
            return response()->json([
                'status' => 199,
                'message' => 'Incorrect password'
            ]);
        }
    }




    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
