@extends('layouts.app')
@section('content')

<style>
    thead{
        text-align: center;
        border: 1px solid gray;
    }
</style>
<section style="padding-top: 40px;">
  <h3>Trial Balance</h3>

    <div class="row" style="padding-top: 20px;">
        <div class="container">
            <div class="col-10">
                <div class="card">
                    <div class="card-nav bg-primary font-weight-bold ps-2">
                        <h5 class="text-white">TRIAL BALANCE</h5>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <h5>TRIAL BALANCE</h5>
                            </div>
                            <table class="table table-bordered">
                                <thead class="table-active">
                                <tr>
                                    <th rowspan="3">Head of Accounts<br><br><br></th>
                                    <th rowspan="3">Beginning
                                        Balance <br>
                                        02-Oct-2022 <br><br></th>
                                    <th colspan="3">During the Period</th>
                                    <th rowspan="3">Ending
                                        Balance <br>
                                        31-Oct-2022 <br><br></th>
                                </tr>
                                <tr>
                                    <th colspan="3">From: 02-Oct-2022 To: 31-Oct-2022</th>
                                </tr>
                                <tr>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Net Activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Non Current Assets</th>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                    </tr>
                                    <tr>
                                        <th>Current Assets</th>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                        <td>2,390,522.00</td>
                                    </tr>
                                    <tr>
                                        <th>Direct Expense</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Indirect Expenses</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Owners' Equity</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Current Liabilities</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Operating Revenue</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Non Operating Revenue</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total Debit</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total Credit</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                    </tr>
                                    <tr>
                                        <th>Mismatch</th>
                                        <td>2,390,522.00</td>
                                        <td>1,621,630.0</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
                                        <td>4,012,152.00</td>
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