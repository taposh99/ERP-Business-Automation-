@extends('layouts.app')
@section('content')

<section style="padding-top: 40px;">
  <h3>Balance Sheet</h3>

    <div class="row" style="padding-top: 20px;">
        <div class="container">
            <div class="col-10">
                <div class="card">
                    <div class="card-nav bg-primary font-weight-bold ps-2">
                        <h5 class="text-white">BALANCE SHEET</h5>
                    </div>
                    <div class="row">
                    <div class="card-body">
                        <div class="d-flex justify-content-center ">
                            <h5>BALANCE SHEET</h5>
                            <h5>Trail SHEET</h5>
                        </div>
                        <table class="table table-bordered">
                                <thead class="table-active">
                                <tr>
                                    <th scope="col">ASSETS</th>
                                    <th scope="col">New </th>
                                    <th scope="col">Opening</th>
                                    <th scope="col">During Time</th>
                                    <th scope="col">Closing</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Non Current Assets</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Current Assets</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total Assets</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    </tbody>                                        
                                    </table>
                                
                                    <table class="table table-bordered">
                                        <thead class="table-active">
                                        <tr>
                                            <th scope="col">LIABILITIES & OWNER'S EQUITY</th>
                                            <th scope="col">Opening</th>
                                            <th scope="col">During Time</th>
                                            <th scope="col">Closing</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Current Liabilities</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Owners' Equity</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Retained earnings</th>
                                            <td>3,000.00</td>
                                            <td>0.00</td>
                                            <td>3,000.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Liabilities and Owner's Equity</th>
                                            <td>3,000.00</td>
                                            <td>0.00</td>
                                            <td>3,000.00</td>
                                        </tr>
                                    </tbody>
                                    <table class="table table-bordered">
                                        <thead class="table-active">
                                        <tr>
                                            <th scope="col">Common Financial Ratios</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Debt Ratio (Total Liabilities / Total Assets)</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Current Ratio (Current Assets / Current Liabilities)</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Working Capital (Current Assets - Current Liabilities)</th>
                                            <td>3,000.00</td>
                                            <td>0.00</td>
                                            <td>3,000.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Assets-to-Equity Ratio (Total Assets / Owner's Equity)</th>
                                            <td>3,000.00</td>
                                            <td>0.00</td>
                                            <td>3,000.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Debt-to-Equity Ratio (Total Liabilities / Owner's Equity)</th>
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