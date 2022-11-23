@extends('layouts.app')
@section('content')

<section style="padding-top: 40px;">
  <h3>Chart of Account</h3>

    <div class="row" style="padding-top: 20px;">
    <div class="container">
    <div class="col-8">
        <div class="card">
            <div class="card-nav bg-primary font-weight-bold ps-2">
                <h5 class="text-white">TRIAL BALANCH</h5>
            </div>
                <div class="row">
                    <div class="card-body">
                      <div class="d-flex justify-content-center ">
                        <h5>CHART OF ACCOUNT</h5>
                      </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Assets
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Assets</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Balance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Non Current Assets</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Current Assets</th>
                                        <td>64645</td>
                                        <td>6444</td>
                                        <td>2342</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Fixed Assets</th>
                                        <td>32422</td>
                                        <td>312323</td>
                                        <td>312323</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Test Group</th>
                                        <td>646465</td>
                                        <td>4242342</td>
                                        <td>4242342</td>
                                      </tr>
                                      <tr>
                                        <td>-Total-</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Liabilities
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Liabilities</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Balance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Non Current Liabilities</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Current Liabilities</th>
                                        <td>64645</td>
                                        <td>6444</td>
                                        <td>2342</td>
                                      </tr>
                                      <tr>
                                        <td>-Total-</td>
                                      </tr>
                                    </tbody>
                                  </table>                          
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Owner's Equity
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Owners' Equity</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Balance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Owners' Equity</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <td>-Total-</td>
                                      </tr>
                                    </tbody>
                                  </table>                                
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                  Expenses
                                </button>
                              </h2>
                              <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Expenses</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Balance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Direct Expense</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Indirect Expenses</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <td>-Total-</td>
                                      </tr>
                                    </tbody>
                                  </table>                                
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseThree">
                                  Revenue
                                </button>
                              </h2>
                              <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Revenue</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Balance</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Operating Revenue</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Non Operating Revenue</th>
                                        <td>23132</td>
                                        <td>4354</td>
                                        <td>322242</td>
                                      </tr>
                                      <tr>
                                        <td>-Total-</td>
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
    </div>
</div>
</section>


@endsection