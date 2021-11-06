<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $access_token = $request->session()->get("access_token");
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get(config("auth.sso_host") .  "/api/v1/client/transactions");
        return $response->json();
    }

    public function bank(Request $request)
    {
        $access_token = $request->session()->get("access_token");
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get(config("auth.sso_host") .  "/api/v1/client/support-banks");
        return $response->json();
    }

    public function admin(Request $request)
    {
        $access_token = $request->session()->get("access_token");
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get(config("auth.sso_host") .  "/api/v1/client/admin");
        return $response->json();
    }

    public function show(Request $request)
    {
        $access_token = $request->session()->get("access_token");
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get(config("auth.sso_host") .  "/api/v1/client/transaction/". $request->get('transaction_id'));
        return $response->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $access_token = $request->session()->get("access_token");
        $data_transaksi = [
            "exec_date" => "2021-11-28",
            "nama_transaksi" => "Table Pembayaran Client 1",
            "detail_transaksi" => [
                [
                    "recipient_name" => "Muhamad Yasin",
                    "account_number" => "7000350308",
                    "bank_code" => "bca",
                    "bank_code_number" => 014,
                    "bank_name" => "Bank Central Asia",
                    "amount" => 10000,
                    "remark" => "Test by Client"
                ]
            ]
        ];
        // json_encode($data_transaksi, true);
        // return $data_transaksi;
        $post_transaksi = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
            ])->asJson()->post(config("auth.sso_host") .  "/api/v1/client/transaction", $data_transaksi);

        return $post_transaksi->json();
    }

    public function token(Request $request)
    {
        $request->session()->put("state", $state =  Str::random(40));
        $query = http_build_query([
            "client_id" => config("auth.client_id"),
            "redirect_uri" => config("auth.callback") ,
            "response_type" => "code",
            "scope" => config("auth.scopes"),
            "state" => $state
        ]);

        return redirect(config("auth.sso_host") .  "/oauth/authorize?" . $query);
    }

    public function client_info(Request $request)
    {
        $access_token = $request->session()->get("access_token");
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get(config("auth.sso_host") .  "/api/v1/me");
        $userArray = $response->json();
        return response()->json($userArray);
    }

    public function refresh_token(Request $request)
    {
        $refresh_token = $request->session()->get("refresh_token");
        $response = Http::asForm()->post(config("auth.sso_host") .'/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
            'client_id' => config("auth.client_id"),
            'client_secret' => config("auth.client_secret"),
            'scope' => '',
        ]);
        $request->session()->put($response->json());
        return $response->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
