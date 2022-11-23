@extends('layouts.app')
@section('content')
    <h2 class="mt-4 mb-4">Return Create</h2>
    <style>
        .input-group-addon {
            float: left;
            width: 50px;
            height: 40px;
            border: 1px solid gray;
            background: white;
            text-align: center;
            padding-top: 8px;
            border-radius: 4px;
        }

        #itemdata {
            background-color: rgb(250, 246, 246);
        }
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-nav bg-primary font-weight-bold ps-2">
                        <h5 class="text-white">SALES RETURN</h5>
                    </div>
                    <div class="card-body">

                        <div class="col-md-12">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <form style="display: flex" action="{{ route('admin.purchase-return.create') }}"
                                                method="POST">
                                                @csrf
                                                <button style="display: inline;border-top-right-radius: 0; border-bottom-right-radius: 0; border-right-color: #fbfbfb;"
                                                    class="input-group-addon" type="submit"><span
                                                        class="fa fa-search"></span></button>
                                                <input type="text" class="form-control"
                                                    style="display: inline;border-top-left-radius: 0; border-bottom-left-radius: 0;"
                                                    placeholder="e.g. Type Product Serial" autocomplete="off">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <form style="display: flex" action="{{ route('admin.purchase-return.create') }}"
                                                method="POST">
                                                @csrf
                                                <button
                                                    style="display: inline;border-top-right-radius: 0; border-bottom-right-radius: 0; border-right-color: #fbfbfb;"
                                                    class="input-group-addon" type="submit"><span
                                                        class="fa fa-search"></span></button>
                                                <input type="text" class="form-control"
                                                    style="display: inline;border-top-left-radius: 0; border-bottom-left-radius: 0;"
                                                    placeholder="e.g. Type Product Serial" autocomplete="off">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mt-5">
                                    <table class="table table-bordered table-striped"
                                        style="margin-bottom: 0; background-color:darkgray;">
                                        <thead>
                                            <tr>
                                                <th width="30px">SN</th>
                                                <th width="214px">Item</th>
                                                <th width="72px">Qty</th>
                                                <th width="72px">Price</th>
                                                <th width="35px">Dis(%)</th>
                                                <th width="35px">Dis(F)</th>
                                                <th width="35px">Re.Qty</th>
                                                <th width="35px">Re.Qty</th>
                                                <th width="77px">SubTotal</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="cart-msg style-3 item" style="padding:0px;">
                                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                            <tbody id="itemdata">
                                                <tr>
                                                    <td colspan="7" class="text-center">There are no Estimate Item!
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td colspan="7" class="text-center">No IMEI or Product Serial!
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
