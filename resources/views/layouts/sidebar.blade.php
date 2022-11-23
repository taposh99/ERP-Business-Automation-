<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav" id="sidebar-main">
                <div class="sb-sidenav-menu-heading">Business Automation</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{--daily process--}}
                @can('Daily Process read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutDailyProcess" aria-expanded="false" aria-controls="collapseLayoutDailyProcess">
                    <div class="sb-nav-link-icon"><i class="fa fa-edit ani_icon"></i></div>
                    Daily Process
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutDailyProcess" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('price-list') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Price List</a>

                        <a class="nav-link" href="{{ route('expense-record') }}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Expenses Record</a>
                        <a class="nav-link" href="{{ route('create-expense') }}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Create Expenses</a>


                        <a class="nav-link" href="{{route('expenses-head')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Expenses Head</a>

                    </nav>
                </div>
                @endcan

                @can('Service read')
                {{--service--}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutÌservice" aria-expanded="false" aria-controls="collapseLayoutÌservice">
                    <div class="sb-nav-link-icon"><i class="fa fa-wrench  ani_icon"></i></div>
                    Service
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayoutÌservice" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('service-list-show')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Service List</a>
                        <a class="nav-link" href="{{route('service-received-show')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Service Received List</a>
                        <a class="nav-link" href="{{route('service-received-create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Service Received Create</a>
                    </nav>
                </div>
                @endcan
                {{--Warranty management--}}

                @can('Warranty Management read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutWarenty" aria-expanded="false" aria-controls="collapseLayoutWarenty">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Warranty Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayoutWarenty" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="{{route('warranty-show')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Warranty Claim</a>
                        <a class="nav-link" href="{{route('service-center-show')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Service Center</a>
                        <a class="nav-link" href="{{route('claim-supplier-show')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Claim to Supplier</a>
                        <a class="nav-link" href="{{route('warranty-stock-show')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Warranty Stock</a>
                        <a class="nav-link" href="{{route('manage-product-show')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Manage Product</a>
                        <a class="nav-link" href="{{route('warranty-delivered-show')}}"> <i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Warranty Delivered</a>
                    </nav>
                </div>
                @endcan
                {{--Purchase--}}

                @can('Purchase read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutPurchase" aria-expanded="false" aria-controls="collapseLayoutPurchase">
                    <div class="sb-nav-link-icon"><i class="fa fa-shopping-basket ani_icon"></i></div>
                    Purchase
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayoutPurchase" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- purchase order --}}
                        <a class="nav-link" href="{{route('admin.purchase-order')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Purchase Order</a>
                        <a class="nav-link" href="{{route('admin.purchase-order.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Purchase Order Create</a>
                        {{-- purchase invoice --}}
                        <a class="nav-link" href="{{route('admin.purchase-invoice')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Purchase Invoice</a>
                        <a class="nav-link" href="{{route('admin.purchase-invoice.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Purchase Invoice Create</a>
                        {{-- purchase invoice --}}
                        <a class="nav-link" href="{{route('admin.purchase-return')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Purchase Return</a>
                        <a class="nav-link" href="{{ route('admin.purchase-return.create') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Purchase Return Create</a>

                    </nav>
                </div>

                @endcan
                {{--Sales--}}

                @can('Sales read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutSales" aria-expanded="false" aria-controls="collapseLayoutSales">
                    <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag ani_icon"></i></div>
                    Sales
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayoutSales" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        {{-- sales estimate --}}
                        <a class="nav-link" href="{{route('admin-sales-manage')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sales Estimate</a>
                        <a class="nav-link" href="{{route('sales-estimate-create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sales Estimate Create</a>
                        
                        {{-- sales invoice --}}
                        <a class="nav-link" href="{{route('admin-sales-invoice-manage')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sales Invoice</a>
                        <a class="nav-link" href="{{route('admin-sales-invoice-create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sales Invoice Create</a>

                        {{-- sales return --}}
                        <a class="nav-link" href="{{route('admin.sales-return')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sales Return</a>
                        <a class="nav-link" href="{{route('admin.sales-return-create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sales Return Create</a>

                    </nav>
                </div>
                <hr>
                @endcan
                @can('Inventory read')
                <!-- inventory -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#inventory" aria-expanded="false" aria-controls="inventory">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Inventory
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="inventory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('inventory.branch.table') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Branch </a>
                        <a class="nav-link" href="{{ route('inventory.warehouse.table') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Warehouse </a>
                        <a class="nav-link" href="{{ route('branch_stock.index') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Branch stock </a>
                        <a class="nav-link" href="{{ route('warehouse_stock.index') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Warehouse stock </a>
                        <a class="nav-link" href="{{ route('inventory.transfer_branch.table') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Transfer branch </a>
                    </nav>
                </div>
                @endcan
                <!-- client setup -->
                @can('Client Setup read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#clientSetup" aria-expanded="false" aria-controls="clientSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Client Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="clientSetup" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('all_group.index') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> All-Group </a>
                        <a class="nav-link" href="{{ route('customer.index') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Customer </a>
                        <a class="nav-link" href="{{ route('supplier.index') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i> Supplier </a>
                    </nav>
                </div>
                @endcan
                @can('Products Setup read')
                <!-- product setup -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#productSetup" aria-expanded="false" aria-controls="productSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Products Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="productSetup" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.manage.category') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Category</a>
                        <a class="nav-link" href="{{ route('admin.manage.subCategory') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sub-Category</a>
                        <a class="nav-link" href="{{ route('admin.manage.product') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Product</a>
                        <a class="nav-link" href="{{ route('admin.manage.stock') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Stock</a>
                    </nav>
                </div>
                @endcan
                @can('Masters Setup read')
                <!-- master setup -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#masterSetup" aria-expanded="false" aria-controls="masterSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Masters Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="masterSetup" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.manage.brand') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Brand</a>
                        <a class="nav-link" href="{{ route('admin.manage.manufacturer') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Manufacturer</a>
                        <a class="nav-link" href="{{ route('admin.manage.unit') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Unit</a>
                        <a class="nav-link" href="{{ route('admin.manage.currency') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Currency</a>
                        <a class="nav-link" href="{{ route('admin.manage.country') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Country</a>
                        <a class="nav-link" href="{{ route('admin.manage.transport') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Transport</a>
                        <a class="nav-link" href="{{ route('admin.manage.color') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Color</a>
                        <a class="nav-link" href="{{ route('admin.manage.size') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Size</a>
                        <a class="nav-link" href="{{ route('admin.manage.district') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>District</a>
                        <a class="nav-link" href="{{ route('admin.manage.zone') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Zone</a>
                    </nav>
                </div>
                @endcan
                @can('Accounts Setup read')
                <!-- account setup -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#accountSetup" aria-expanded="false" aria-controls="accountSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Accounts Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="accountSetup" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.manage.class') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Class</a>
                        <a class="nav-link" href="{{ route('admin.manage.group') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Group</a>
                        <a class="nav-link" href="{{ route('admin.manage.sub-group') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Sub-Group</a>
                        <a class="nav-link" href="{{ route('admin.manage.ledger') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Ledger</a>
                        <a class="nav-link" href="{{ route('admin.manage.journal') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Journal</a>
                    </nav>
                </div>
                @endcan
                @can('Finance Record read')
                <!-- finance record -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#financeRecord" aria-expanded="false" aria-controls="financeRecord">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Finance Record
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="financeRecord" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.chart_account') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Chart of Account</a>
                        <a class="nav-link" href="{{ route('admin.profit_Loss') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Profit And Loss</a>
                        <a class="nav-link" href="{{ route('admin.trial.balance') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Trial Balance</a>
                        <a class="nav-link" href="{{ route('admin.balance_sheet') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Balance Sheet</a>
                        <a class="nav-link" href="{{ route('admin.finance.analysis') }}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Finance Analysis</a>
                    </nav>
                </div>
                @endcan
                @can('Payroll read')
                <hr>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutPayroll" aria-expanded="false" aria-controls="collapseLayoutPayroll">
                    <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt"></i></div>
                    Payroll
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutPayroll" aria-labelledby="headingPayroll" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('department.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Department List</a>
                        <a class="nav-link" href="{{route('department.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Department</a>
                        <a class="nav-link" href="{{route('designation.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Designation List</a>
                        <a class="nav-link" href="{{route('designation.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Designation</a>
                        <a class="nav-link" href="{{route('employee.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Employee List</a>
                        <a class="nav-link" href="{{route('employee.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Employee</a>
                        <a class="nav-link" href="{{route('leavetypes.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Leave Type</a>
                        <a class="nav-link" href="{{route('leavetypes.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Leave Type</a>
                        <a class="nav-link" href="{{route('leave-application.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Leave Record</a>
                        <a class="nav-link" href="{{route('leave-application.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Leave Application</a>
                    </nav>
                </div>
                @endcan
                @can('Bank read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutBank" aria-expanded="false" aria-controls="collapseLayoutBank">
                    <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt"></i></div>
                    Bank
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutBank" aria-labelledby="headingBank" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('banks.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Bank List</a>
                        <a class="nav-link" href="{{route('banks.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Bank</a>
                        <a class="nav-link" href="{{route('bank-account.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Account List</a>
                        <a class="nav-link" href="{{route('bank-account.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Account</a>
                        <a class="nav-link" href="{{route('mobile-account.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Mobile Account</a>
                        <a class="nav-link" href="{{route('transanction.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>All Transaction</a>
                        <a class="nav-link" href="{{route('transanction.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Transaction</a>
                        <a class="nav-link" href="{{route('manage-cheque.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Cheque Management</a>
                    </nav>
                </div>
                @endcan
                @can('Users And Role read')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutUser" aria-expanded="false" aria-controls="collapseLayoutUser">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
                    Users & Roles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutUser" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('roles.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Role List</a>
                        <a class="nav-link" href="{{route('roles.create')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Add Role</a>
                        <a class="nav-link" href="{{route('users.index')}}"><i class="fa fa-angle-right" style="margin-right: 10px;" aria-hidden="true"></i>Users</a>


                    </nav>
                </div>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link collapsed" onclick="event.preventDefault(); this.closest('form').submit();" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutLogOut" aria-expanded="false" aria-controls="collapseLayoutLogOut">
                        <div class="sb-nav-link-icon"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            &nbsp; Log Out
                        </div>
                    </a>
                </form>
            </div>
        </div>
    </nav>
</div>
