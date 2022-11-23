@extends('layouts.app')
@section('content')

<section style="padding-top: 40px;">
  <h3>Profit & Loss</h3>

    <div class="row" style="padding-top: 20px;">
        <div class="container">
            <div class="col-10">
                <div class="card">
                    <div class="card-nav bg-primary font-weight-bold ps-2">
                        <h5 class="text-white">PROFIT & LOSS STATEMENT</h5>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <div class="d-flex justify-content-center ">
                                <h5>INCOME STATEMENT</h5>
                            </div>
                            <table class="table table-bordered">
                                <thead class="table-active">
                                <tr>
                                    <th scope="col">REVENUE</th>
                                    <th scope="col">Opening</th>
                                    <th scope="col">During Time</th>
                                    <th scope="col">Closing</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Operating Revenue</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Goods Sales</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">600002: Sales Revenue</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">-Total-</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    </tbody>                                        
                                    </table>
                                
                                    <table class="table table-bordered">
                                    <thead class="table-active">
                                    <tr>
                                        <th scope="col">EXPENSES</th>
                                        <th scope="col">Opening</th>
                                        <th scope="col">During Time</th>
                                        <th scope="col">Closing</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Direct Expense</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Operating Expenses</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">800032: Sale Comition</th>
                                        <td>3,000.00</td>
                                        <td>0.00</td>
                                        <td>3,000.00</td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection