@extends('layouts.app')
@section('tittle')
    create-expense
@endsection
@section('content')

    <section class="content">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-top: 17px;">Add Expenses</h3>
                    </div>
                    <div>
                        <a href="{{route('expense-record')}}" class="btn btn-success" style="margin-left: 900px;margin-bottom: 10px;">Expensive Record</a>
                    </div>
                    <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('expense-voucher') }}" onsubmit="return validate()"
                                    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    <div class="col-md-12 popup_details_div">
                                        <div class="row">
                                            <center>
                                                <h3 id="exp" class="page-title">EXPENSES VOUCHER</h3><br><br>
                                            </center>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <center>
                                                        <a id="addcash"
                                                            style="cursor: pointer;font-size: 16px;margin-right: 4px;color: red;"><span
                                                                class="fa fa-plus"></span></a>
                                                        <span style="font-size: 20px;font-weight: bold;">Balance:
                                                        </span><span style="font-size: 20px;font-weight: bold;color:red;"
                                                            id="cbal">-2,066.00</span>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @php $i=1 @endphp
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><b>Expenses No:</b></span>
                                                        <input type="text" class="form-control ms-2" maxlength="15"
                                                            name="invno" id="invno" placeholder="e.g. AXE1211198"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                @error('invno')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <br>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><b>Date:</b></span>

                                                        <input class="form-control ms-2" id="currentDate" type="date"
                                                            name="date">
                                                    </div>
                                                </div>
                                                <br>
                                                @error('date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Expenses Head</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="expense">
                                                            <option value="">-Select-</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->name }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Ref</label>
                                                    <input type="text" maxlength="25" class="form-control" name="ref"
                                                        id="ref" placeholder="e.g. Sumon" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" maxlength="6" class="form-control"
                                                        name="totalamount" id="amount" placeholder="e.g. 500"
                                                        autocomplete="off">
                                                </div>

                                            </div>
                                            @error('totalamount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <input type="button" id="addexp" class="btn btn-flat bg-red"
                                                        style="background-color: red;
                                              color: white;"
                                                        value="Add" />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-striped" id="create_expanse_table">
                                                    <thead style="background-color: #babebf;">
                                                        <th style="width:40px; text-align:center">SN</th>
                                                        <th>Expenses Head</th>
                                                        <th>Amount</th>
                                                        <th>Ref</th>
                                                        <th style="width:40px; text-align:center"><a class="empty"
                                                                style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                                                        </th>
                                                    </thead>
                                                    <tbody id="itemdata">

                                                    </tbody>
                                                    <tfoot id="totalitemfoot" style="opacity: 0">
                                                        <td style="width:40px; text-align:center"></td>
                                                        <td style="text-align: right;">Total</td>
                                                        <td id="totalamount"></td>
                                                        <input type="hidden" name="ref" id="ref">

                                                        <input type="hidden" name="totalamount" id="totalvalue">
                                                        <td></td>
                                                        <td class="removedata" style="width:40px; text-align:center"><a
                                                                class="empty" style="cursor: pointer;"></a></td>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Note</label>
                                                    <textarea class="form-control" name="note" id="note" maxlength="250" rows="3"
                                                        placeholder="e.g. Note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-12 nopadding widgets_area"></div>
                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-md-8"></div>

                                        <div class="modal-footer">

                                            <input id="submitbtn" type="submit" class="btn btn-primary" value="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" id="total-invoices"  value="{{ $totalInvoices }}"/>
    <script>
        var i = 100 + parseInt(document.getElementById('total-invoices').value);
        // console.log(typeof i);
        var date = new Date();
        var currentDate = date.toISOString().slice(0, 10);
        document.getElementById('currentDate').value = currentDate;

        var defaultExpense =
            `EXP:${date.getDate()}${date.getMonth() + 1}${date.getUTCFullYear().toString().slice(2, 4)}${++i}`;
        document.getElementById('invno').value = defaultExpense;
    </script>

@endsection
