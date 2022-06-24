<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminCrmController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminQuotationController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminSalesPersonController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminVendorController;
use App\Http\Controllers\Admin\AdminVendorCrmController;
use App\Http\Controllers\Admin\AdminListOfWorkController;
use App\Http\Controllers\Admin\AdminScopeOfWorkController;
use App\Http\Controllers\Admin\AdminEnquiryController;
use App\Http\Controllers\Admin\AdminNewsFeedController;
use App\Http\Controllers\Admin\AdminSubContractorController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\handyConnectController;

use App\Http\Controllers\Font\WelcomeController;
use App\Http\Controllers\LangController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ServiceController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\EnquiryController;
use App\Http\Controllers\frontend\CareerController;
use App\Http\Controllers\frontend\FAQController;
use App\Http\Controllers\frontend\GetQuoteController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/guest_change/{lang}', [LangController::class, 'changeLanguage'])->name('guest.change.lang');


// admin

Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login')->middleware('languageSwitcher');

Route::middleware(['auth', 'languageSwitcher'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('dashboard', AdminDashboardController::class)->names([
        'index' => 'dashboard.index'
    ]);

    Route::get('get_all_role', [AdminRoleController::class, 'get_all_role'])->name('role.get_all_role')->middleware('signed');
    Route::post('delete_role', [AdminRoleController::class, 'delete'])->name('role.delete')->middleware('signed');
    Route::get('role_list', [AdminRoleController::class, 'create'])->name('role.list');
    Route::resource('role', AdminRoleController::class)->names([
        'index'     => 'role.index',
        'store'     => 'role.store',
        'edit'      => 'role.edit',
        'show'      =>  'role.show',
        'update'    => 'add.permission.update',
    ])->middleware('signed');

    Route::resource('users', AdminUserController::class)->names([
        'index' => 'users.index',
        'create'    => 'users.create'
    ])->middleware('signed');


    Route::get('customer_list', [AdminCustomerController::class, 'customer_list'])->name('customer.customer_list');
    Route::get('get_all_customer', [AdminCustomerController::class, 'get_all_customer'])->name('customer.get_all_customer');
    
    Route::resource('customer', AdminCustomerController::class)->names([
        'index'     => 'customer.index',
        'create'    => 'customer.create',
        'store'    => 'customer.store'
    ])->middleware('signed');

    Route::post('delete_company', [AdminCompanyController::class, 'delete'])->name('company.delete')->middleware('signed');
    Route::post('edit_company', [AdminCompanyController::class, 'edit_company'])->name('company.edit_company')->middleware('signed');
    Route::get('get_edit_data', [AdminCompanyController::class, 'get_edit_data'])->name('company.get_edit_data');
    Route::get('company_create', [AdminCompanyController::class, 'create'])->name('company.company_create');
    Route::get('get_all_company', [AdminCompanyController::class, 'get_all_company'])->name('company.get_all_company');
    Route::resource('company', AdminCompanyController::class)->names([
        'index' => 'company.index',
        'store'   => 'company.store'
    ])->middleware('signed');

    Route::get('category_create', [AdminCategoryController::class, 'create'])->name('category.category_create');
    Route::get('category_get_edit_data', [AdminCategoryController::class, 'get_edit_data'])->name('category.get_edit_data');
    Route::post('category_edit_company', [AdminCategoryController::class, 'edit_category'])->name('category.edit_category')->middleware('signed');
    Route::post('category_delete_company', [AdminCategoryController::class, 'delete'])->name('category.delete')->middleware('signed');
    Route::get('get_all_category', [AdminCategoryController::class, 'get_all_category'])->name('category.get_all_category');
    Route::resource('category', AdminCategoryController::class)->names([
        'index' => 'category.index',
        'store' => 'category.store'
    ])->middleware('signed');


    Route::post('service_delete', [AdminServiceController::class, 'delete'])->name('service.delete');
    Route::post('update_service', [AdminServiceController::class, 'update_service'])->name('service.update_service')->middleware('signed');
    Route::get('get_all_services', [AdminServiceController::class, 'get_all_services'])->name('service.get_all_services');
    Route::get('get_all_services_list', [AdminServiceController::class, 'get_all_services_list'])->name('service.get_all_services_list');
    Route::get('get_all_tax', [AdminServiceController::class, 'get_all_tax'])->name('tax.get_all_tax')->middleware('signed');
    Route::post('add_new_tax', [AdminServiceController::class, 'add_new_tax'])->name('tax.add_new_tax')->middleware('signed');
    Route::get('get_all_unit_of_measures', [AdminServiceController::class, 'get_all_unit_of_measures'])->name('units.get_all_unit_of_measures');
    Route::post('add_new_unit_of_measures', [AdminServiceController::class, 'add_new_unit_of_measures'])->name('unit.add_new_unit_of_measures')->middleware('signed');
    Route::resource('service', AdminServiceController::class)->names([
        'index' => 'service.index',
        'create' => 'service.create',
        'store' => 'service.store',
        'show' => 'service.show'
    ])->middleware('signed');

    Route::post('update_vendor', [AdminVendorController::class, 'update_vendor'])->name('vendor.update_vendor')->middleware('signed');
    Route::post('vendor_delete', [AdminVendorController::class, 'delete'])->name('vendor.delete')->middleware('signed');
    Route::get('get_all_vendor', [AdminVendorController::class, 'get_all_vendor'])->name('vendor.get_all_vendor');
    Route::get('vendor_get_all_service', [AdminVendorController::class, 'get_all_service'])->name('vendor.get_all_service');
    Route::resource('vendor', AdminVendorController::class)->names([
        'index'     => 'vendor.index',
        'create'    => 'vendor.create',
        'store'     => 'vendor.store',
        'show'      => 'vendor.show'
    ])->middleware('signed');

    Route::get('sales_person_list', [AdminEmployeeController::class, 'sales_person_list'])->name('employee.sales_person_list')->middleware('signed');
    Route::get('designation_list', [AdminEmployeeController::class, 'designation_list'])->name('employee.designation_list');
    Route::post('store_designation', [AdminEmployeeController::class, 'store_designation'])->name('employee.store_designation')->middleware('signed');
    Route::get('/get_employee', [AdminEmployeeController::class, 'get_employee'])->name('employee.get_employee');
    Route::post('employee_delete', [AdminEmployeeController::class, 'delete'])->name('employee.delete')->middleware('signed');
    Route::post('update_employee', [AdminEmployeeController::class, 'update_employee'])->name('employee.update_employee')->middleware('signed');
    Route::get('get_all_employee', [AdminEmployeeController::class, 'get_all_employee'])->name('employee.get_all_employee');
    Route::resource('employee', AdminEmployeeController::class)->names([
        'index'     => 'employee.index',
        'create'    => 'employee.create',
        'store'     => 'employee.store',
        'show'      => 'employee.show'
    ])->middleware('signed');


    Route::get('show_lead', [AdminCrmController::class, 'show_lead'])->middleware('signed')->name('show_lead');
    Route::post('assign_sales_person', [AdminCrmController::class, 'assign_sales_person'])->name('crm.assign_sales_person')->middleware('signed');
    Route::get('search_company', [AdminCrmController::class, 'search_company'])->name('admin_crm.search_company');
    Route::post('assign_to_vendors', [AdminCrmController::class, 'assign_to_vendors'])->name('crm.assign_to_vendors')->middleware('signed');
    Route::get('vendor_list', [AdminCrmController::class, 'vendor_list'])->name('crm.vendor_list')->middleware('signed');
    Route::post('add_field_visit', [AdminCrmController::class, 'add_field_visit'])->name('crm.add_field_visit')->middleware('signed');
    Route::get('show_service_data_for_crm', [AdminCrmController::class, 'show_service_data_for_crm'])->name('crm.show_service_data_for_crm');
    Route::get('/get_admin_crm_data', [AdminCrmController::class, 'get_admin_crm_data'])->name('crm.get_admin_crm_data')->middleware('signed');
    Route::get('/search_service', [AdminCrmController::class, 'search_service'])->name('crm.search_service');
    Route::get('crm_search_customer', [AdminCrmController::class, 'search_customer'])->name('crm.search_customer');
    Route::get('/show_crm/{id}', [AdminCrmController::class, 'show'])->name('crm.show_crm');
    Route::post('/update_crm', [AdminCrmController::class, 'update_crm'])->name('crm.update_crm')->middleware('signed');
    Route::resource('crm', AdminCrmController::class)->names([
        'index'     => 'crm.index',
        'create'    => 'crm.create',
        'store'     => 'crm.store',
        'edit'      => 'crm.edit'
    ])->middleware('signed');

    Route::get('show_vendor_crm/{id}', [AdminVendorCrmController::class, 'show'])->name('vendor_crm.show_vendor_crm');
    Route::get('get_vendor_crm', [AdminVendorCrmController::class, 'get_vendor_crm'])->name('vendor_crm.get_vendor_crm')->middleware('signed');
    Route::resource('vendor_crm', AdminVendorCrmController::class)->names([
        'index' => 'vendor_crm.index',
    ])->middleware('signed');


    Route::post('/add_platform_fee', [AdminQuotationController::class, 'add_platform_fee'])->name('add_platform_fee')->middleware('signed');
    Route::get('get_all_list', [AdminQuotationController::class, 'get_all_list'])->name('quotation.get_all_list');
    Route::get('quotation_list/{id}', [AdminQuotationController::class, 'list'])->name('quotation_list')->middleware('signed');
    Route::post('approve_quotation', [AdminQuotationController::class, 'approve'])->name('approve_quotation')->middleware('signed');
    Route::get('show_lead_list', [AdminQuotationController::class, 'create'])->name('show_lead_list');
    Route::resource('admin_quotation', AdminQuotationController::class)->middleware('signed');

    Route::get('/sales_crm_show/{id}', [AdminSalesPersonController::class, 'show'])->name('sales_crm_show');
    Route::resource('sales_person', AdminSalesPersonController::class)->middleware('signed');

    //Report Module
    Route::get('/sales_report', [AdminReportController::class, 'index'])->name('sales_report_show');
    Route::get('/get_sales_report', [AdminReportController::class, 'salesReport'])->name('get_sales_report');
    Route::get('/order_report', [AdminReportController::class, 'order_report_index'])->name('order_report_show');
    Route::get('/get_order_report', [AdminReportController::class, 'orderReport'])->name('get_order_report');

});



// Route::resource('/', WelcomeController::class)->names([
//     'index' => 'index'
// ]); 

Route::get('/d', function () {
    echo password_hash("Debasis", PASSWORD_BCRYPT, ['cost' => 12]);
}); 
require __DIR__ . '/auth.php'; 

Route::get('works/list',[AdminQuotationController::class, 'works_list'])->name('works-list'); 

Route::get('get/scope/{id}',[AdminQuotationController::class, 'scope_menu'] )->name('get-scope');
Route::get('get/scope/commercial/{id}',[AdminQuotationController::class, 'scope_menu_commercial'] )
->name('get-scope-commercial');

Route::get('generate/quotation',[AdminQuotationController::class, 'generate_quotation'])->name('generate-quotation');
Route::any('generate/invoice/residential',[AdminQuotationController::class, 'invoice_residential'])->name('invoice-residential');
Route::any('generate/invoice/commercial',[AdminQuotationController::class, 'invoice_commercial'])->name('invoice-commercial');

Route::get('residential/tab', [AdminQuotationController::class, 'residential_tab'])->name('residential');

Route::get('commercial/tab', [AdminQuotationController::class, 'commercial_tab'])->name('commercial');
Route::post('make/pdf/residential',[AdminQuotationController::class, 'make_pdf'])->name('make-pdf');
Route::post('make/pdf/commercial',[AdminQuotationController::class, 'make_pdf_commercial'])->name('make-pdf-commercial');


// Route::get('home', [WelcomeController::class, 'index'])->name('home');
// Route::get('about', [WelcomeController::class, 'about'])->name('about'); 
// Route::get('services', [WelcomeController::class, 'services'])->name('services');

Route::get('selecte/work/list',[AdminQuotationController::class, 'works_table_data'])->name('selected-work-list');

Route::get('add/handy/connect/quotation',[handyConnectController::class, 'index'] )->name('add-handyconnect-quotation');

Route::get('get/services/for/quotation',[handyConnectController::class, 'get_services_list'] )->name('get-services-list');
Route::post('quotation/form', [handyConnectController::class, 'quatation_save'])->name('quotation_form');

 Route::get('get-menu/{id}',[handyConnectController::class, 'get_menu'] )->name('get-menu');

 Route::any('get/services/list',[handyConnectController::class, 'display']);
 Route::any('get-services-row/{id}',[handyConnectController::class, 'get_services_row']);

 Route::any('get/rows/{id}', [handyConnectController::class,'get_rows']);
 Route::any('get/selected/row/{id}',[handyConnectController::class, 'get_selected_row']);

 Route::post('hc/quotation/store',[handyConnectController::class, 'hc_quotation']);
// Route::get('hc/quotation/store/{id}', [handyConnectController::class, 'hc_quotation'])->name('hc_quotation_list')->middleware('signed');


 
  //List of Work Route
    Route::get('listofwork', [AdminListOfWorkController::class,'index'])->name('listofwork');
    Route::get('listofwork_create', [AdminListOfWorkController::class, 'create'])->name('listofwork.listofwork_create');
    Route::get('get_all_listofwork', [AdminListOfWorkController::class, 'get_all_listofwork'])->name('listofwork.get_all_listofwork');
    Route::post('storelistofwork', [AdminListOfWorkController::class,'store'])->name('storelistofwork');
    Route::get('editlistofwork', [AdminListOfWorkController::class, 'edit_data'])->name('listofwork.edit');
    Route::post('update_listofwork', [AdminListOfWorkController::class, 'update'])->name('listofwork.update');
    Route::post('delete_listofwork', [AdminListOfWorkController::class, 'delete'])->name('listofwork.delete');

    //Scope Of Work Route
    Route::get('scopeofwork', [AdminScopeOfWorkController::class,'index'])->name('scopeofwork');
    Route::get('scopeofwork_create', [AdminScopeOfWorkController::class, 'create'])->name('scopeofwork.scopeofwork_create');
    Route::get('get_all_scopeofwork', [AdminScopeOfWorkController::class, 'get_all_scopeofwork'])->name('scopeofwork.get_all_scopeofwork');
    Route::post('storescopeofwork', [AdminScopeOfWorkController::class,'store'])->name('storescopeofwork');
    Route::get('editscopeofwork', [AdminScopeOfWorkController::class, 'edit_data'])->name('scopeofwork.edit');
    Route::post('update_scopeofwork', [AdminScopeOfWorkController::class, 'update'])->name('scopeofwork.update');
    Route::post('delete_scopeofwork', [AdminScopeOfWorkController::class, 'delete'])->name('scopeofwork.delete');


  //News Admin Route
    Route::get('news', [AdminNewsFeedController::class,'index'])->name('news');
    Route::get('news_create', [AdminNewsFeedController::class, 'create'])->name('news.news_create');
    Route::get('get_all_news', [AdminNewsFeedController::class, 'get_all_news'])->name('news.get_all_news');
    Route::post('storenews', [AdminNewsFeedController::class,'store'])->name('storenews');
    Route::get('editnews', [AdminNewsFeedController::class, 'edit_data'])->name('news.edit');
    Route::post('update_news', [AdminNewsFeedController::class, 'update'])->name('news.update');
    Route::post('delete_news', [AdminNewsFeedController::class, 'delete'])->name('news.delete');


    //Sub Contractor
    Route::get('subcontractor', [AdminSubContractorController::class,'index'])->name('subcontractor');
    Route::get('subcontractor_create', [AdminSubContractorController::class, 'create'])->name('subcontractor.subcontractor_create');
    Route::get('get_all_subcontractor', [AdminSubContractorController::class, 'get_all_subcontractor'])->name('subcontractor.get_all_subcontractor');
    Route::post('storesubcontractor', [AdminSubContractorController::class,'store'])->name('storesubcontractor');
    Route::get('editsubcontractor', [AdminSubContractorController::class, 'edit_data'])->name('subcontractor.edit');
    Route::post('update_subcontractor', [AdminSubContractorController::class, 'update'])->name('subcontractor.update');
    Route::post('delete_subcontractor', [AdminSubContractorController::class, 'delete'])->name('subcontractor.delete');
     //Sub Contractor Assign Job
    Route::get('subcontractor/assign_job', [AdminSubContractorController::class,'assign_job'])->name('subcontractor.assign_job');
    Route::get('subcontractor/assign_job/create_job', [AdminSubContractorController::class, 'create_job'])->name('subcontractor.create_job');
    Route::post('subcontractor/assign_job/store_job', [AdminSubContractorController::class,'store_job'])->name('subcontractor.store_job');
    Route::get('subcontractor/assign_job/edit_job', [AdminSubContractorController::class, 'edit_job'])->name('subcontractor.edit_job');
    Route::post('subcontractor/assign_job/update_job', [AdminSubContractorController::class, 'update_job'])->name('subcontractor.update_job');
    Route::post('subcontractor/assign_job/delete_job', [AdminSubContractorController::class, 'delete_job'])->name('subcontractor.delete_job');
    
    Route::get('subcontractor/assign/job/view', [AdminSubContractorController::class, 'view_job'])->name('subcontractor.view_job');
    
    Route::post('subcontractor/get_customer_order', [AdminSubContractorController::class,'get_customer_order'])->name('subcontractor.get_customer_order');

    // order Managements Route

Route::any('order',[AdminOrderController::class, 'index'])->name('order-index');
Route::any('order/view/{id}',[AdminOrderController::class, 'view'])->name('order-view');
Route::any('order/delete/{id}',[AdminOrderController::class, 'delete'])->name('order-delete');
Route::any('order/edit/{id}',[AdminOrderController::class, 'edit'])->name('order-edit');
Route::any('order/update',[AdminOrderController::class, 'update'])->name('order-update');
Route::any('orders/status/{status}',[AdminOrderController::class, 'status']); 
Route::post('order/status/approve/{id}',[AdminOrderController::class, 'approve']);
Route::post('order/status/deapprove/{id}',[AdminOrderController::class, 'deapprove']);

 //<!---------------------------------Frontend Routes--------------------------------!>

 //Home
 Route::get('/',[HomeController::class,'index'])->name('home');
 
//Register-Login
 Route::get('registration',[AuthController::class,'index_register'])->name('registration');
 Route::post('front/register',[AuthController::class,'register'])->name('front.register');
 Route::post('front/login',[AuthController::class,'login'])->name('front.login');

 //About
 Route::get('about',[AboutController::class,'index'])->name('about_us');
 
 //Service
 Route::get('service',[ServiceController::class,'index'])->name('services');
 Route::get('electrical',[ServiceController::class,'elctrical_services'])->name('electricals');
 Route::get('plumbing',[ServiceController::class,'plumbing_services'])->name('plumbing');
 Route::get('carpentry',[ServiceController::class,'carpentry_services'])->name('carpentry');
 Route::get('painting',[ServiceController::class,'painting_services'])->name('painting');
 Route::get('furniture',[ServiceController::class,'furniture_services'])->name('furniture');
 Route::get('door_gate',[ServiceController::class,'door_gate_services'])->name('door_gate');
 Route::get('air_condition',[ServiceController::class,'air_condition_services'])->name('air_condition');
 Route::get('maintenance_repair',[ServiceController::class,'maintenance_repair_services'])->name('maintenance_repair');

 //News
 Route::get('blog',[NewsController::class,'index'])->name('blog');
 Route::get('aging_parents',[NewsController::class,'aging_parents'])->name('aging_parents');
 Route::get('home_repair',[NewsController::class,'home_repair'])->name('home_repair');
 Route::get('small_bathroom',[NewsController::class,'small_bathroom'])->name('small_bathroom');
 Route::get('puppy_protect',[NewsController::class,'puppy_protect'])->name('puppy_protect');
 Route::get('install_shower',[NewsController::class,'install_shower'])->name('install_shower');
 Route::get('home_organization',[NewsController::class,'home_organization'])->name('home_organization');
 Route::get('indor_home_makeover',[NewsController::class,'indor_home_makeover'])->name('indor_home_makeover');
 


//Contact
 Route::get('contact',[ContactController::class,'index'])->name('contact');
 Route::post('contact_email',[ContactController::class,'store'])->name('contact_email');

 //Enquiry
 Route::any('enquiry_mail',[EnquiryController::class,'send_mail'])->name('enquiry_mail');
 Route::get('enquiry/enquiry_list',[AdminEnquiryController::class,'enquiry_list'])->name('enquiry.enquiry_list');
 Route::get('enquiry/index',[AdminEnquiryController::class,'index'])->name('enquiry.list');

//Career
 Route::get('careers',[CareerController::class,'index'])->name('careers');
 Route::any('career_mail',[CareerController::class,'store'])->name('career_mail');

//FAQ
Route::get('faqs',[FAQController::class,'index'])->name('faqs');

//Get A Quote
Route::post('get_quote_email',[GetQuoteController::class,'store'])->name('get_quote_email');


