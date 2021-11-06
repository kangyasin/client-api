<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SSOController extends Controller
{
    public function authorizeClient(Request $request)
    {
        $response = Http::asForm()->post(
            config('auth.sso_host') .  '/oauth/token',
            [
                'grant_type' => 'client_credentials',
                'client_id' => config('auth.client_id'),
                'client_secret' => config('auth.client_secret'),
                'username' => 'kangyasin',
                'password' => '12345678',
                'scope' => '*'
            ]
        );
        return response()->json(
            [
                'status' => 'OK',
                'data' => $response->json()
            ]
        );
        $query = http_build_query([
            'client_id' => config('auth.client_id'),
            'redirect_uri' => config('auth.callback') ,
            'response_type' => 'code',
            'scope' => config('auth.scopes'),
            'state' => Str::random(40)
        ]);

        return redirect(config('auth.sso_host') .  '/oauth/authorize?' . $query);
    }
    public function getToken(Request $request)
    {


        // $response = Http::withHeaders(
        // [
        //     'Content-Type' => 'application/json',
        //     'X-Requested-With' => 'XMLHttpRequest'
        // ]
        // )->asJson()->post(
        //     config('auth.sso_host') .  '/oauth/token',$request->all()
        // );
        $response = Http::asJson()->post(
            config('auth.sso_host') .  '/oauth/token',
            [
                'grant_type' => 'client_credentials',
                'client_id' => config('auth.client_id'),
                'client_secret' => config('auth.client_secret'),
                'scope' => '*'
            ]
        );
        return response()->json(
            [
                'status' => 'OK',
                'data' => $response->json()
            ]
        );
    }
    public function getUser(Request $request)
    {
        $access_token = $request->header('Authorization');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $access_token
        ])->get(config('auth.sso_host') .  '/api/v1/client/me');

        return response()->json(
            [
                'status' => 'OK',
                'data' => $response->json()
            ]
        );
    }
}
