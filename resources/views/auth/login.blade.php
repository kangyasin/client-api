@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get Token Duithape</div>

                <div class="card-body">
                    <a href="{{ route("transaction.token") }}" class="btn btn-block btn-primary btn-sm">Get Token</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get Refresh Token</div>

                <div class="card-body">
                    <form action="{{route("transaction.refresh_token")}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Get Refresh Token</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get Enterprise Info Duithape</div>

                <div class="card-body">
                    <a href="{{ route("transaction.client_info") }}" class="btn btn-block btn-primary btn-sm">Get Enterprise User</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get All Transaction Duithape</div>

                <div class="card-body">
                    <form action="{{route("transaction.get")}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Get All Transaction</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get All Support Bank Duithape</div>

                <div class="card-body">
                    <a href="{{ route("transaction.bank") }}" class="btn btn-block btn-primary btn-sm">Get Bank Support Duithape</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get All Admin Client Duithape</div>
                <div class="card-body">
                    <a href="{{ route("transaction.admin") }}" class="btn btn-block btn-primary btn-sm">Get Bank Support Duithape</a>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Get Transaction Duithape by ID</div>

                <div class="card-body">
                    <form action="{{route("transaction.show")}}" method="POST">
                        @csrf
                        <input type="number" class="form-control" placeholder="input id duithape transaction" required name="transaction_id">
                        <br>
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Get Transaction by ID</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Store New Transaction Duithape</div>
                <div class="alert alert-primary" style="margin: 10px">Nama Transaksi : <b>Table Pembayaran Client 1</b></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Rekening</th>
                            <th>Bank</th>
                            <th>Bank Code</th>
                            <th>Nama Penerima</th>
                            <th>Nominal</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7000350308</td>
                            <td>bca</td>
                            <td>014</td>
                            <td>Muhamad Yasin</td>
                            <td>10000</td>
                            <td>Test by Client</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-body">
                    <form action="{{route("transaction.store")}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Store New Transaction</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cleansing List Bank Duithape</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Rekening</th>
                            <th>Bank</th>
                            <th>Bank Code</th>
                            <th>Nama Penerima</th>
                            <th>Nominal</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7000350308</td>
                            <td>bca</td>
                            <td>014</td>
                            <td>Muhamad Yasin</td>
                            <td>10000</td>
                            <td>Test by Client</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-body">
                    <a href="{{ route("transaction.cleansing") }}" class="btn btn-block btn-primary btn-sm">Cleansing Bank</a>
                </div>
            </div>
        </div>
        </div>
    </div> --}}
</div>
@endsection
