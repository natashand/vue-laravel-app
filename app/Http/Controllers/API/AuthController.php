<?php

namespace App\Http\Controllers\API\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UserRequest;
use App\System\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * login api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if(Auth::guard('web')->attempt(
            array_merge(
                $request->only('email', 'password'),
                ['role' => 'client', 'active' => true]
            )
        )
        ) {
            $user = Auth::user();
            $user->generateToken();
            return response()->json(['data' => $user->getProfile()]);
        } else {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => [
                        'These credentials do not match our records.'
                    ]
                ]
            ], 422);
        }
    }

    public function registration(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->generateToken();
        return response()->json(['data' => $user->getProfile()], 200);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return response()
            ->json(['data' => $request->user()->getProfile()]);
    }
}
