<?php

use App\Http\Controllers\Backend\AccountSetupController;
use App\Http\Controllers\Backend\Bank\BankAccountController;
use App\Http\Controllers\Backend\Inventory\InventoryController;
use App\Http\Controllers\Backend\ProductSetupController;

use App\Http\Controllers\Backend\DailyProcessController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\WarrantyController;
use App\Http\Controllers\Backend\Sales\SalesController;

use App\Http\Controllers\Backend\Bank\BankController;
use App\Http\Controllers\Backend\Bank\MobileAccountController;
use App\Http\Controllers\Backend\Bank\TransanctionController;
use App\Http\Controllers\Backend\Bank\ChequeManagementController;
use App\Http\Controllers\Backend\ClientSetup\ClientAllGroupController;
use App\Http\Controllers\Backend\ClientSetup\CustomerController;
use App\Http\Controllers\Backend\ClientSetup\SupplierController;
use App\Http\Controllers\Backend\Inventory\BranchStockController;
use App\Http\Controllers\Backend\Inventory\TransferBranchController;
use App\Http\Controllers\Backend\Inventory\TransferWarehouseController;
use App\Http\Controllers\Backend\Inventory\WarehouseStockController;
use App\Http\Controllers\Backend\MasterSetup\BrandController;
use App\Http\Controllers\Backend\MasterSetup\ColorController;
use App\Http\Controllers\Backend\MasterSetup\CountryController;
use App\Http\Controllers\Backend\MasterSetup\CurrencyController;
use App\Http\Controllers\Backend\MasterSetup\DistrictController;
use App\Http\Controllers\Backend\MasterSetup\ManufacturerController;
use App\Http\Controllers\Backend\MasterSetup\SizeController;
use App\Http\Controllers\Backend\MasterSetup\TransportController;
use App\Http\Controllers\Backend\MasterSetup\UnitController;
use App\Http\Controllers\Backend\MasterSetup\ZoneController;
use App\Http\Controllers\FinanceRecord\ChartOfAccount;
use App\Http\Controllers\Backend\Payroll\DepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserAndRoles\UserController;
use App\Http\Controllers\Backend\UserAndRoles\RoleController;
use App\Http\Controllers\Backend\Payroll\DesignationController;
use App\Http\Controllers\Backend\Payroll\EmployeeController;
use App\Http\Controllers\Backend\Purchase\PurchaseInvoiceController;
use App\Http\Controllers\Backend\Purchase\PurchaseOrderController;
use App\Http\Controllers\Backend\Purchase\PurchaseReturnController;
use App\Http\Controllers\Backend\Sales\SalesInvoiceController;
use App\Http\Controllers\Backend\Sales\SalesReturnController;
use App\Http\Controllers\Backend\Payroll\LeaveApplicationController;
use App\Http\Controllers\Backend\Payroll\LeaveTypeController;
use App\Http\Controllers\BarcodeController;

/*
|--------------------------------------------------------------------------
|                    Md.Saniatul Haque
|--------------------------------------------------------------------------
| */


Route::get('/', function () {
    return view('auth.login');
})->middleware(['guest']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';



    // daily process
    Route::group(['prefix' => 'daily-process'], function () {
        //price list
        Route::get('/price-list', [DailyProcessController::class, 'PriceList'])->name('price-list');
        Route::post('/price-list-store', [DailyProcessController::class, 'PriceListStore'])->name('price-list-store');
        Route::get('/price-list-edit/{id}', [DailyProcessController::class, 'priceListEdit'])->name('price-list-edit');
        Route::post('/price-list-update/{id}', [DailyProcessController::class, 'priceListUpdate'])->name('price-list-update');
        Route::post('/price-list-delete', [DailyProcessController::class, 'priceListDelete'])->name('price-list-delete');


        Route::get('/expense-record', [DailyProcessController::class, 'expenseRecord'])->name('expense-record');
        Route::get('/expenses-head', [DailyProcessController::class, 'expensesHead'])->name('expenses-head');
        Route::get('/add-expenses-head', [DailyProcessController::class, 'AddExpensesHead'])->name('add-expenses-head');
        Route::get('/priceblade', [DailyProcessController::class, 'PriceList'])->name('priceblade');

        Route::get('/add-expenses-category', [DailyProcessController::class, 'addExpensesCategory'])->name('add-expenses-category');
        Route::get('/new-category', [DailyProcessController::class, 'saveCategory'])->name('new-category');

        Route::post('/add-expenses', [DailyProcessController::class, 'saveExpenses'])->name('add-expenses');

        Route::post('/delete-expenses-head', [DailyProcessController::class, 'deleteExpensesHead'])->name('delete-expenses-head');
        Route::get('/edit-expenses-head/{id}', [DailyProcessController::class, 'editExpensesHead'])->name('edit-expenses-head');
        Route::post('/update-expenses-head/{id}', [DailyProcessController::class, 'updateExpensesHead'])->name('update-expenses-head');
        Route::get('/create-expense', [DailyProcessController::class, 'createExpense'])->name('create-expense');
        Route::get('/edit-expenses-record/{id}', [DailyProcessController::class, 'editExpenseRecord'])->name('edit-expenses-record');
        Route::post('/update-expenses-record/{id}', [DailyProcessController::class, 'updateExpenseRecord'])->name('update-expenses-record');
        Route::post('/delete-expenses-record', [DailyProcessController::class, 'deleteExpenseRecord'])->name('delete-expenses-record');

        // expense
        Route::post('/expense-voucher', [DailyProcessController::class, 'saveExpenseVoucher'])->name('expense-voucher');
    });


    // Service
    Route::group(['prefix' => 'Service'], function () {
        // Service Received Create
        Route::get('/service-received-create', [ServiceController::class, 'CustomerReceivedCreate'])->name('service-received-create');
        Route::post('/service-received-store', [ServiceController::class, 'CustomerReceivedstore'])->name('service-received-store');
        Route::get('/service-received-show', [ServiceController::class, 'CustomerReceivedshow'])->name('service-received-show');
        Route::get('/service-received-edit/{id}', [ServiceController::class, 'CustomerReceivedEdit'])->name('service-received-edit');
        Route::post('/service-received-update/{id}', [ServiceController::class, 'CustomerReceivedUpdate'])->name('service-received-update');
        Route::post('/service-received-delete', [ServiceController::class, 'CustomerReceivedDelete'])->name('service-received-delete');

        // Service list
        Route::get('/service-list-show', [ServiceController::class, 'serviceListShow'])->name('service-list-show');
        Route::post('/service-list-store', [ServiceController::class, 'serviceListStore'])->name('service-list-store');
        Route::get('/service-list-edit/{id}', [ServiceController::class, 'serviceListEdit'])->name('service-list-edit');
        Route::post('/service-list-update/{id}', [ServiceController::class, 'serviceListUpdate'])->name('service-list-update');
        Route::get('/service-list-delete', [ServiceController::class, 'serviceListDelete'])->name('service-list-delete');
    });

    // Warranty management
    Route::group(['prefix' => 'Warranty'], function () {
        // Service Center

        Route::get('/service-center-show', [WarrantyController::class, 'serviceCenterShow'])->name('service-center-show');
        Route::post('/service-center-store', [WarrantyController::class, 'serviceCenterStore'])->name('service-center-store');
        Route::get('/service-center-edit/{id}', [WarrantyController::class, 'serviceCenterEdit'])->name('service-center-edit');
        Route::post('/service-center-update/{id}', [WarrantyController::class, 'serviceCenterUpdate'])->name('service-center-update');
        Route::post('/service-center-delete', [WarrantyController::class, 'serviceCenterDelete'])->name('service-center-delete');

        // warranty claim
        Route::get('/warranty-show', [WarrantyController::class, 'warrantyShow'])->name('warranty-show');
        Route::post('/warranty-show-store', [WarrantyController::class, 'warrantyStore'])->name('warranty-show-store');
        Route::get('/warranty-show-edit/{id}', [WarrantyController::class, 'warrantyShowEdit'])->name('warranty-show-edit');
        Route::post('/warranty-show-update/{id}', [WarrantyController::class, 'warrantyShowUpdate'])->name('warranty-show-update');
        Route::post('/warranty-show-delete', [WarrantyController::class, 'warrantyShowDelete'])->name('warranty-show-delete');

        // Claim to Supplier
        Route::get('/claim-supplier-show', [WarrantyController::class, 'ClaimSupplierShow'])->name('claim-supplier-show');
        Route::post('/claim-supplier-store', [WarrantyController::class, 'ClaimSupplierStore'])->name('claim-supplier-store');
        Route::get('/claim-supplier-edit/{id}', [WarrantyController::class, 'ClaimSupplierEdit'])->name('claim-supplier-edit');
        Route::post('/claim-supplier-update/{id}', [WarrantyController::class, 'ClaimSupplierUpdate'])->name('claim-supplier-update');
        Route::post('/claim-supplier-delete', [WarrantyController::class, 'ClaimSupplierDelete'])->name('claim-supplier-delete');

        // Warranty Stock
        Route::get('/warranty-stock-show', [WarrantyController::class, 'WarrantyStockShow'])->name('warranty-stock-show');
        Route::post('/warranty-stock-store', [WarrantyController::class, 'warrantyStockStore'])->name('warranty-stock-store');
        Route::get('/warranty-stock-edit/{id}', [WarrantyController::class, 'warrantyStockEdit'])->name('warranty-stock-edit');
        Route::post('/warranty-stock-update/{id}', [WarrantyController::class, 'warrantyStockUpdate'])->name('warranty-stock-update');
        Route::post('/warranty-stock-delete', [WarrantyController::class, 'warrantyStockDelete'])->name('warranty-stock-delete');

        // Manage Product
        Route::get('/manage-product-show', [WarrantyController::class, 'manageProductShow'])->name('manage-product-show');
        Route::post('/manage-product-store', [WarrantyController::class, 'manageProductStore'])->name('manage-product-store');
        Route::get('/manage-product-edit/{id}', [WarrantyController::class, 'manageProductEdit'])->name('manage-product-edit');
        Route::post('/manage-product-update/{id}', [WarrantyController::class, 'manageProductUpdate'])->name('manage-product-update');
        Route::post('/manage-product-delete', [WarrantyController::class, 'manageProductDelete'])->name('manage-product-delete');


        // Warranty Delivered
        Route::get('/warranty-delivered-show', [WarrantyController::class, 'warrantyDeliveredShow'])->name('warranty-delivered-show');
        Route::post('/warranty-delivered-store', [WarrantyController::class, 'warrantyDeliveredStore'])->name('warranty-delivered-store');
        Route::get('/warranty-delivered-edit/{id}', [WarrantyController::class, 'warrantyDeliveredEdit'])->name('warranty-delivered-edit');
        Route::post('/warranty-delivered-update/{id}', [WarrantyController::class, 'warrantyDeliveredUpdate'])->name('warranty-delivered-update');
        Route::post('/warranty-delivered-delete', [WarrantyController::class, 'warrantyDeliveredDelete'])->name('warranty-delivered-delete');
    });

    // Purchase
    Route::group(['prefix' => 'Purchase'], function () {

        // Purchase Order

        Route::get('/purchase-order', [PurchaseOrderController::class, 'purchaseOrder'])->name('admin.purchase-order');
        Route::get('/purchase/order/create', [PurchaseOrderController::class, 'purchaseOrderCreate'])->name('admin.purchase-order.create');
        Route::get('/purchase/order/product/add/{id}', [PurchaseOrderController::class, 'addProduct'])->name('add.pur.order.product');
        Route::get('/purchase/order/product/view', [PurchaseOrderController::class, 'view'])->name('view.purchase.order.product');
        Route::get('/purchase/order/product/clear', [PurchaseOrderController::class, 'clear'])->name('clear.purchase.order.product');
        Route::get('/purchase/order/product/delete', [PurchaseOrderController::class, 'destroy'])->name('purchase.order.product.delete');

        // Purchase Invoice
        Route::get('/purchase-invoice', [PurchaseInvoiceController::class, 'purchaseInvoice'])->name('admin.purchase-invoice');
        Route::get('/purchase/invoice/create', [PurchaseInvoiceController::class, 'purchaseInvoiceCreate'])->name('admin.purchase-invoice.create');

        // Purchase Return
        Route::get('/purchase-return', [PurchaseReturnController::class, 'purchaseReturn'])->name('admin.purchase-return');
        Route::get('/purchase/return/create', [PurchaseReturnController::class, 'purchaseReturnCreate'])->name('admin.purchase-return.create');
        Route::post('/store/purchase-return', [PurchaseReturnController::class, 'storepurchaseReturn'])->name('admin.store.purchase-return');
        Route::get('/edit/purchase-return/{id}', [PurchaseReturnController::class, 'editpurchaseReturn'])->name('admin.edit.purchase-return');
        Route::post('/update/purchase-return/{id}', [PurchaseReturnController::class, 'updatepurchaseReturn'])->name('admin.update.purchase-return');
        Route::get('/delete/purchase-return/{id}', [PurchaseReturnController::class, 'deletepurchaseReturn'])->name('admin.delete.purchase-return');
    });

    // Sales
    Route::group(['prefix' => 'Sales'], function () {

        //sales estimate
        Route::get('/manage/sales', [SalesController::class, 'SalesEstimate'])->name('admin-sales-manage');
        Route::get('/sales-estimate-create', [SalesController::class, 'salesEstimateCreate'])->name('sales-estimate-create');
        Route::get('/sales-estimate-create/product/{id}', [SalesController::class, 'addProduct'])->name('add.sales.estimate.product');
        Route::get('/sales-estimate-create/view', [SalesController::class, 'view'])->name('sales.estimate.product.view');
        Route::get('/sales-estimate-create/product/clear', [SalesController::class, 'clear'])->name('clear.sales.estimate.product');
        Route::get('/sales-estimate-create/product/delete/{id}', [SalesController::class, 'destroy'])->name('sales.estimate.product.delete');
        Route::get('/sales-estimate-invoice-create', [SalesController::class, 'salesEstimateInvoiceCreate'])->name('sales.estimate.invoice.create');

        //sales invoice
        Route::get('/manage/sales/invoice', [SalesInvoiceController::class, 'SalesInvoice'])->name('admin-sales-invoice-manage');
        Route::get('/sales-invoice-create', [SalesInvoiceController::class, 'salesInvoiceCreate'])->name('admin-sales-invoice-create');

        // Sales Return
        Route::get('/sales-return', [SalesReturnController::class, 'salesReturn'])->name('admin.sales-return');
        Route::get('/sales-return-create', [SalesReturnController::class, 'salesReturnCreate'])->name('admin.sales-return-create');
        Route::post('/store/sales-return', [SalesReturnController::class, 'storeSalesReturn'])->name('admin.store.sales-return');
        Route::get('/edit/sales-return/{id}', [SalesReturnController::class, 'editSalesReturn'])->name('admin.edit.sales-return');
        Route::post('/update/sales-return/{id}', [SalesReturnController::class, 'updateSalesReturn'])->name('admin.update.sales-return');
        Route::get('/delete/sales-return/{id}', [SalesReturnController::class, 'deleteSalesReturn'])->name('admin.delete.sales-return');
    });
//barcode
    Route::get('/barcode',[BarcodeController::class, 'barcodeIndex'])->name('barcode');

    // inventory
    Route::group(['prefix' => 'inventory'], function () {
        // branch
        Route::get('/branch/table', [InventoryController::class, 'branchTable'])->name('inventory.branch.table');
        Route::post('/branch/add', [InventoryController::class, 'addBranch'])->name('inventory.branch.add');
        Route::get('/branch/edit/{id}', [InventoryController::class, 'editBranch'])->name('inventory.branch.edit');
        Route::post('/branch/update/{id}', [InventoryController::class, 'updateBranch'])->name('inventory.branch.update');
        Route::get('/branch/delete/{id}', [InventoryController::class, 'destroyBranch'])->name('inventory.branch.delete');

        // warehouse
        Route::get('/warehouse/table', [InventoryController::class, 'warehouseTable'])->name('inventory.warehouse.table');
        Route::post('/warehouse/add', [InventoryController::class, 'addWarehouse'])->name('inventory.warehouse.add');
        Route::get('/warehouse/edit/{id}', [InventoryController::class, 'editWarehouse'])->name('inventory.warehouse.edit');
        Route::post('/warehouse/update/{id}', [InventoryController::class, 'updateWarehouse'])->name('inventory.warehouse.update');
        Route::get('/warehouse/delete/{id}', [InventoryController::class, 'destroyWarehouse'])->name('inventory.warehouse.delete');

        // branch stock
        Route::resource('branch_stock', BranchStockController::class);
        Route::get('/branch_stock/delete/{id}', [BranchStockController::class, 'destroy'])->name('inventory.branch_stock.delete');

        // warehouse stock
        Route::resource('warehouse_stock', WarehouseStockController::class);
        Route::get('/warehouse_stock/delete/{id}', [CustomerController::class, 'destroy'])->name('inventory.warehouse_stock.delete');

        // Transfer from branch
        Route::get('/transfer_branch/table', [TransferBranchController::class, 'table'])->name('inventory.transfer_branch.table');
        Route::get('/transfer_branch/create', [TransferBranchController::class, 'createTransfer'])->name('create.branch.transfer');
        Route::get('/transfer_branch/branch/product/{id}', [TransferBranchController::class, 'branchProduct'])->name('inventory.B.P');
        Route::get('/B/P/transfer/{id}', [TransferBranchController::class, 'addProduct'])->name('inventory.B.P.transfer');

        Route::get('/B/P/transfer/view', [TransferBranchController::class, 'viewProduct'])->name('view.product.transfered');
        Route::get('/branch/product/transfered/view', [TransferBranchController::class, 'view'])->name('branch.product.transfered');
        Route::get('/branch/product/transfered/save', [TransferBranchController::class, 'save'])->name('save.branch.product.transfer');
        Route::get('/branch/product/transfered/delete/{id}', [TransferBranchController::class, 'delete'])->name('branch.product.transfered.delete');

        Route::get('/transfer_branch/clear', [TransferBranchController::class, 'clear'])->name('inventory.transfer_branch.clear');
        Route::get('/transfer_branch/delete/{id}', [TransferBranchController::class, 'destroy'])->name('inventory.transfer_branch.delete');

        // Transfer from warehouse
        Route::resource('transfer_warehouse', TransferWarehouseController::class);
        Route::get('/transfer_warehouse/delete/{id}', [TransferWarehouseController::class, 'destroy'])->name('inventory.transfer_warehouse.delete');
    });


    // client-setup
    Route::group(['prefix' => 'client-setup'], function () {
        // group
        Route::resource('all_group', ClientAllGroupController::class);
        Route::get('/all_group/delete/{id}', [ClientAllGroupController::class, 'destroy'])->name('client_setup.group.delete');

        // customer
        Route::resource('customer', CustomerController::class);
        Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('client_setup.customer.delete');

        // supplier
        Route::resource('supplier', SupplierController::class);
        Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('client_setup.supplier.delete');
    });

    // product setup
    Route::group(['prefix' => 'product-setup'], function () {

        // Category
        Route::get('/manage/category', [ProductSetupController::class, 'manageCategory'])->name('admin.manage.category');
        Route::post('/store/category', [ProductSetupController::class, 'storeCategory'])->name('admin.store.category');
        Route::get('/edit/category/{id}', [ProductSetupController::class, 'editCategory'])->name('admin.edit.category');
        Route::post('/update/category/{id}', [ProductSetupController::class, 'updateCategory'])->name('admin.update.category');
        Route::get('/delete/category/{id}', [ProductSetupController::class, 'deleteCategory'])->name('admin.delete.category');

        // Sub-Category
        Route::get('/manage/subCategory', [ProductSetupController::class, 'manageSubCategory'])->name('admin.manage.subCategory');
        Route::post('/store/subCategory', [ProductSetupController::class, 'storeSubCategory'])->name('admin.store.subCategory');
        Route::get('/edit/subCategory/{id}', [ProductSetupController::class, 'editSubCategory'])->name('admin.edit.subCategory');
        Route::post('/update/subCategory/{id}', [ProductSetupController::class, 'updateSubCategory'])->name('admin.update.subCategory');
        Route::get('/delete/subCategory/{id}', [ProductSetupController::class, 'deleteSubCategory'])->name('admin.delete.subCategory');

        // Product
        Route::get('/manage/product', [ProductSetupController::class, 'manageProduct'])->name('admin.manage.product');
        /////////// json = cat wise sub-cat  ///////////
        Route::get('/get/category/wise/sub-cat/{id}', [ProductSetupController::class, 'getCatWiseSubCat']);


        /////////// json = branch wise warehouse  ///////////
        Route::get('get/branch/wise/warehouse/{id}', [ProductSetupController::class, 'branchWarhouse']);

        /////////// json = warehouse wise product  ///////////
        Route::get('/get/warehouse/wise/product/{id}', [ProductSetupController::class, 'warehouseProduct']);

        Route::post('/store/product', [ProductSetupController::class, 'storeProduct'])->name('admin.store.product');
        Route::get('/edit/product/{id}', [ProductSetupController::class, 'editProduct'])->name('admin.edit.product');
        Route::post('/update/product/{id}', [ProductSetupController::class, 'updateProduct'])->name('admin.update.product');
        Route::get('/delete/product/{id}', [ProductSetupController::class, 'deleteProduct'])->name('admin.delete.product');
        Route::get('/view/product/image/{id}', [ProductSetupController::class, 'viewProduct'])->name('admin.view.product');
        Route::post('/change/product/image/{id}', [ProductSetupController::class, 'changeProduct'])->name('admin.change.product.image');

        // Stock
        Route::get('/manage/stock', [ProductSetupController::class, 'manageStock'])->name('admin.manage.stock');
        Route::post('/store/stock', [ProductSetupController::class, 'storeStock'])->name('admin.store.stock');
        Route::get('/edit/stock/{id}', [ProductSetupController::class, 'editStock'])->name('admin.edit.stock');
        Route::post('/update/stock/{id}', [ProductSetupController::class, 'updateStock'])->name('admin.update.stock');
        Route::get('/delete/stock/{id}', [ProductSetupController::class, 'deleteStock'])->name('admin.delete.stock');
    });

    // account setup
    Route::group(['prefix' => 'account-setup'], function () {

        // class
        Route::get('/manage/class', [AccountSetupController::class, 'manageClass'])->name('admin.manage.class');
        Route::post('/store/class', [AccountSetupController::class, 'storeClass'])->name('admin.store.class');
        Route::get('/edit/class/{id}', [AccountSetupController::class, 'editClass'])->name('admin.edit.class');
        Route::post('/update/class/{id}', [AccountSetupController::class, 'updateClass'])->name('admin.update.class');
        Route::get('/delete/class/{id}', [AccountSetupController::class, 'deleteClass'])->name('admin.delete.class');

        // group
        Route::get('/manage/group', [AccountSetupController::class, 'manageGroup'])->name('admin.manage.group');
        Route::post('/store/group', [AccountSetupController::class, 'storeGroup'])->name('admin.store.group');
        Route::get('/edit/group/{id}', [AccountSetupController::class, 'editGroup'])->name('admin.edit.group');
        Route::post('/update/group/{id}', [AccountSetupController::class, 'updateGroup'])->name('admin.update.group');
        Route::get('/delete/group/{id}', [AccountSetupController::class, 'deleteGroup'])->name('admin.delete.group');

        // sub-group
        Route::get('/manage/sub-group', [AccountSetupController::class, 'manageSubGroup'])->name('admin.manage.sub-group');
        Route::post('/store/sub-group', [AccountSetupController::class, 'storeSubGroup'])->name('admin.store.sub-group');
        Route::get('/edit/sub-group/{id}', [AccountSetupController::class, 'editSubGroup'])->name('admin.edit.sub-group');
        Route::post('/update/sub-group/{id}', [AccountSetupController::class, 'updateSubGroup'])->name('admin.update.sub-group');
        Route::get('/delete/sub-group/{id}', [AccountSetupController::class, 'deleteSubGroup'])->name('admin.delete.sub-group');

        // ledger
        Route::get('/manage/ledger', [AccountSetupController::class, 'manageLedger'])->name('admin.manage.ledger');
        Route::post('/store/ledger', [AccountSetupController::class, 'storeLedger'])->name('admin.store.ledger');
        Route::get('/edit/ledger/{id}', [AccountSetupController::class, 'editLedger'])->name('admin.edit.ledger');
        Route::post('/update/ledger/{id}', [AccountSetupController::class, 'updateLedger'])->name('admin.update.ledger');
        Route::get('/delete/ledger/{id}', [AccountSetupController::class, 'deleteLedger'])->name('admin.delete.ledger');

        // journal
        Route::get('/manage/journal', [AccountSetupController::class, 'manageJournal'])->name('admin.manage.journal');
        Route::post('/store/journal', [AccountSetupController::class, 'storeJournal'])->name('admin.store.journal');
        Route::get('/edit/journal/{id}', [AccountSetupController::class, 'editJournal'])->name('admin.edit.journal');
        Route::post('/update/journal/{id}', [AccountSetupController::class, 'updateJournal'])->name('admin.update.journal');
        Route::get('/delete/journal/{id}', [AccountSetupController::class, 'deleteJournal'])->name('admin.delete.journal');
    });

    // finanaceRecord
    Route::group(['prefix' => 'chart_account'], function () {
        Route::get('/chartAccount', [ChartOfAccount::class, 'chartAccount'])->name('admin.chart_account');
        Route::get('/profit_loss', [ChartOfAccount::class, 'profitLoss'])->name('admin.profit_Loss');
        Route::get('/trial_balance', [ChartOfAccount::class, 'trialBalance'])->name('admin.trial.balance');
        Route::get('/balance_sheet', [ChartOfAccount::class, 'balanceSheet'])->name('admin.balance_sheet');
        Route::get('/finance_analysis', [ChartOfAccount::class, 'financeAnalysis'])->name('admin.finance.analysis');
    });
    //master_setup
    Route::group(['prefix' => 'master_setup'], function () {

        //brand
        Route::get('/manage/brand', [BrandController::class, 'manageBrand'])->name('admin.manage.brand');
        Route::post('/store/brand', [BrandController::class, 'storeBrand'])->name('admin.store.brand');
        Route::get('/edit/brand/{id}', [BrandController::class, 'editBrand'])->name('admin.edit.brand');
        Route::post('/update/brand/{id}', [BrandController::class, 'updateBrand'])->name('admin.update.brand');
        Route::get('/delete/brand/{id}', [BrandController::class, 'deleteBrand'])->name('admin.delete.brand');

        //manufacturer
        Route::get('/manage/manufacturer', [ManufacturerController::class, 'manageManufacturer'])->name('admin.manage.manufacturer');
        Route::post('/store/manufacturer', [ManufacturerController::class, 'storeManufacturer'])->name('admin.store.manufacturer');
        Route::get('/edit/manufacturer/{id}', [ManufacturerController::class, 'editManufacturer'])->name('admin.edit.manufacturer');
        Route::post('/update/manufacturer/{id}', [ManufacturerController::class, 'updateManufacturer'])->name('admin.update.manufacturer');
        Route::get('/delete/manufacturer/{id}', [ManufacturerController::class, 'deleteManufacturer'])->name('admin.delete.manufacturer');

        //unit
        Route::get('/manage/unit', [UnitController::class, 'manageUnit'])->name('admin.manage.unit');
        Route::post('/store/unit', [UnitController::class, 'storeUnit'])->name('admin.store.unit');
        Route::get('/edit/unit/{id}', [UnitController::class, 'editUnit'])->name('admin.edit.unit');
        Route::post('/update/unit/{id}', [UnitController::class, 'updateUnit'])->name('admin.update.unit');
        Route::get('/delete/unit/{id}', [UnitController::class, 'deleteUnit'])->name('admin.delete.unit');

        //currency
        Route::get('/manage/currency', [CurrencyController::class, 'manageCurrency'])->name('admin.manage.currency');
        Route::post('/store/currency', [CurrencyController::class, 'storeCurrency'])->name('admin.store.currency');
        Route::get('/edit/currency/{id}', [CurrencyController::class, 'editCurrency'])->name('admin.edit.currency');
        Route::post('/update/currency/{id}', [CurrencyController::class, 'updateCurrency'])->name('admin.update.currency');
        Route::get('/delete/currency/{id}', [CurrencyController::class, 'deleteCurrency'])->name('admin.delete.currency');

        //country
        Route::get('/manage/country', [CountryController::class, 'manageCountry'])->name('admin.manage.country');
        Route::post('/store/country', [CountryController::class, 'storeCountry'])->name('admin.store.country');
        Route::get('/edit/country/{id}', [CountryController::class, 'editCountry'])->name('admin.edit.country');
        Route::post('/update/country/{id}', [CountryController::class, 'updateCountry'])->name('admin.update.country');
        Route::get('/delete/country/{id}', [CountryController::class, 'deleteCountry'])->name('admin.delete.country');

        //transport
        Route::get('/manage/transport', [TransportController::class, 'manageTransport'])->name('admin.manage.transport');
        Route::post('/store/transport', [TransportController::class, 'storeTransport'])->name('admin.store.transport');
        Route::get('/edit/transport/{id}', [TransportController::class, 'editTransport'])->name('admin.edit.transport');
        Route::post('/update/transport/{id}', [TransportController::class, 'updateTransport'])->name('admin.update.transport');
        Route::get('/delete/transport/{id}', [TransportController::class, 'deleteTransport'])->name('admin.delete.transport');

        //color
        Route::get('/manage/color', [ColorController::class, 'manageColor'])->name('admin.manage.color');
        Route::post('/store/color', [ColorController::class, 'storeColor'])->name('admin.store.color');
        Route::get('/edit/color/{id}', [ColorController::class, 'editColor'])->name('admin.edit.color');
        Route::post('/update/color/{id}', [ColorController::class, 'updateColor'])->name('admin.update.color');
        Route::get('/delete/color/{id}', [ColorController::class, 'deleteColor'])->name('admin.delete.color');

        //size
        Route::get('/manage/size', [SizeController::class, 'manageSize'])->name('admin.manage.size');
        Route::post('/store/size', [SizeController::class, 'storeSize'])->name('admin.store.size');
        Route::get('/edit/size/{id}', [SizeController::class, 'editSize'])->name('admin.edit.size');
        Route::post('/update/size/{id}', [SizeController::class, 'updateSize'])->name('admin.update.size');
        Route::get('/delete/size/{id}', [SizeController::class, 'deleteSize'])->name('admin.delete.size');

        //district
        Route::get('/manage/district', [DistrictController::class, 'manageDistrict'])->name('admin.manage.district');
        Route::post('/store/district', [DistrictController::class, 'storeDistrict'])->name('admin.store.district');
        Route::get('/edit/district/{id}', [DistrictController::class, 'editDistrict'])->name('admin.edit.district');
        Route::post('/update/district/{id}', [DistrictController::class, 'updateDistrict'])->name('admin.update.district');
        Route::get('/delete/district/{id}', [DistrictController::class, 'deleteDistrict'])->name('admin.delete.district');

        //zone
        Route::get('/manage/zone', [ZoneController::class, 'manageZone'])->name('admin.manage.zone');
        Route::post('/store/zone', [ZoneController::class, 'storeZone'])->name('admin.store.zone');
        Route::get('/edit/zone/{id}', [ZoneController::class, 'editZone'])->name('admin.edit.zone');
        Route::post('/update/zone/{id}', [ZoneController::class, 'updateZone'])->name('admin.update.zone');
        Route::get('/delete/zone/{id}', [ZoneController::class, 'deleteZone'])->name('admin.delete.zone');

        Route::resource('users', UserController::class);

        //Roles
        Route::resource('roles', RoleController::class);
    
        //Banks
        Route::resource('banks', BankController::class);
    
        //Bank Account
        Route::resource('bank-account', BankAccountController::class);
    
    
        //Mobile Account
        Route::resource('mobile-account', MobileAccountController::class);
    
    
        //Transanction
        Route::resource('transanction', TransanctionController::class);
        Route::get('balance/', [TransanctionController::class, 'get_balance'])->name('accounts.get_balance');
    
        //Manage Cheque
        Route::resource('manage-cheque', ChequeManagementController::class);
        Route::resource('manage-cheque', ChequeManagementController::class);
    
        //Department Controller
        Route::resource('department', DepartmentController::class);
    
        //Designation Controller
        Route::resource('designation', DesignationController::class);
    
        //Employee Controller
        Route::resource('employee', EmployeeController::class);
    
        //LeaveType Controller
        Route::resource('leavetypes', LeaveTypeController::class);
    
        //LeaveApplication Controller
        Route::resource('leave-application', LeaveApplicationController::class);
    
    });



    
   


