<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PriorityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BuGroupController;
use App\Http\Controllers\GroupMemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SubscriptionPackageController;
use App\Http\Controllers\BuFieldController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\NotificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
///TYPES CONTROLLER
Route::get('types',  [TypeController::class, 'index']);
Route::get('companytype/{id}',  [TypeController::class, 'companywise']);
Route::post('types', [TypeController::class, 'store']);
Route::get('types/{id}', [TypeController::class, 'show']);
Route::put('types/{id}', [TypeController::class, 'update']);
Route::get('types/parent/{id}', [TypeController::class, 'parent']);
Route::delete('types/{id}',[TypeController::class, 'destroy'] );

///STATUS CONTROLLER
Route::get('status', [StatusController::class, 'index']);
Route::post('status', [StatusController::class, 'store']);
Route::get('status/{id}', [StatusController::class, 'show']);
Route::get('status/company/{id}', [StatusController::class, 'companywise']);
Route::put('status/{id}', [StatusController::class, 'update']);
Route::delete('status/{id}', [StatusController::class, 'destroy']);

///PRIORITY CONTROLLER
Route::get('priority', [PriorityController::class, 'index']);
Route::post('priority', [PriorityController::class, 'store']);
Route::get('priority/{id}', [PriorityController::class, 'show']);
Route::get('priority/company/{id}', [PriorityController::class, 'companywise']);
Route::put('priority/{id}', [PriorityController::class, 'update']);
Route::delete('priority/{id}', [PriorityController::class, 'destroy']);



///IMPACTS CONTROLLER
Route::get('impacts', [ImpactController::class, 'index']);
Route::post('impacts', [ImpactController::class, 'store']);
Route::get('impacts/{id}', [ImpactController::class, 'show']);
Route::get('impacts/company/{id}', [ImpactController::class, 'companywise']);
Route::put('impacts/{id}', [ImpactController::class, 'update']);
Route::delete('impacts/{id}', [ImpactController::class, 'destroy']);

Route::get('bu_groups', [BuGroupController::class, 'index']);
Route::post('bu_groups', [BuGroupController::class, 'store']);
Route::post('bu_groups/designation', [BuGroupController::class, 'group_designation']);
Route::get('bu_groups/{id}', [BuGroupController::class, 'show']);
Route::get('bu_groups_dropdown/{id}', [BuGroupController::class, 'bu_groupdropdown']);
Route::get('bu_groups/company/{id}', [BuGroupController::class, 'companywise']);
Route::put('bu_groups/{id}', [BuGroupController::class, 'update']);
Route::delete('bu_groups/{id}', [BuGroupController::class, 'destroy']);

///GROUP MEMBERS CONTROLLER///
Route::get('group-members', [GroupMemberController::class, 'index']);
Route::post('group-members', [GroupMemberController::class, 'store']);
Route::get('group-members/{id}', [GroupMemberController::class, 'show']);
Route::get('group-members/group/{id}', [GroupMemberController::class, 'companywise']);
Route::put('group-members/{id}', [GroupMemberController::class, 'update']);
Route::delete('group-members/{id}', [GroupMemberController::class, 'destroy']);
Route::delete('group-members/group/{id}', [GroupMemberController::class, 'destroygroup']);

//USER CONTROLLER//

Route::get('users/super_admin_users', [UserController::class, 'super_admin_users']);
Route::get('company_wise_dashboard/{id}', [DashboardController ::class, 'company_wise_dashboard']);
Route::get('v_username/{username}', [UserController::class, 'verify_username']);
Route::get('v_username/{id}/{username}', [UserController::class, 'verify_username_up']);

Route::get('users', [UserController::class, 'index2']);
Route::post('users', [UserController::class, 'store']);
Route::post('store_customers', [UserController::class, 'store_customer']);
Route::post('update_customers/{id}', [UserController::class, 'customer_update']);

Route::get('super_admin_customer', [UserController::class, 'super_admin_customer']);
Route::get('customers', [UserController::class, 'customer_show']);
Route::get('bu_wise_cus/{id}', [UserController::class, 'show_customer_by_bu_id']);
Route::get('customers/{id}', [UserController::class, 'show_customer_by_id']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('users/company/{id}', [UserController::class, 'companywise']);
Route::get('forgot_pass/{email}', [UserController::class, 'forgot_password_get']);
Route::get('reset/{email}', [UserController::class, 'reset_password']);

Route::post('users/profile_update', [UserController::class, 'profile_update']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);
Route::get('users/{bu_id}/{des_id}', [UserController::class, 'groupdesignationuser']);
Route::get('users_bu_group/{g_id}', [UserController::class, 'bugroupname']);

///Business Unit Controller//
Route::get('business_units', [BusinessUnitController::class, 'index']);
Route::get('business_units_r/{c_id}/{id}', [BusinessUnitController::class, 'bu_responsible']);
Route::post('business_units', [BusinessUnitController::class, 'store']);
Route::get('business_units/{id}', [BusinessUnitController::class, 'show']);
Route::get('company_customer_r/{id}', [BusinessUnitController::class, 'companywise_by_company_r']);
Route::get('business_units/company/{id}', [BusinessUnitController::class, 'companywise']);
Route::get('business_units/parent_bu/{cid}/{buid}/{group}', [BusinessUnitController::class, 'parent_bu_wise']);

Route::get('business_units/company_vendor/{id}', [BusinessUnitController::class, 'vendorbu']);
Route::put('business_units/{id}', [BusinessUnitController::class, 'update']);
Route::delete('business_units/{id}', [BusinessUnitController::class, 'destroy']);


Route::get('vendors', [VendorController::class, 'index']);
Route::post('vendors', [VendorController::class, 'store']);
Route::get('vendors/{id}', [VendorController::class, 'show']);
Route::get('vendors/company/{id}', [VendorController::class, 'companywise']);
Route::put('vendors/{id}', [VendorController::class, 'update']);
Route::delete('vendors/{id}', [VendorController::class, 'destroy']);

Route::get('subscription-packages', [SubscriptionPackageController::class, 'index']);
Route::post('subscription-packages', [SubscriptionPackageController::class, 'store']);
Route::get('subscription-packages/{id}', [SubscriptionPackageController::class, 'show']);
Route::put('subscription-packages/{id}', [SubscriptionPackageController::class, 'update']);
Route::delete('subscription-packages/{id}', [SubscriptionPackageController::class, 'destroy']);



Route::get('bu_fields', [BuFieldController::class, 'index']);
Route::post('bu_fields', [BuFieldController::class, 'store']);
Route::get('bu_fields/{id}', [BuFieldController::class, 'show']);
Route::delete('bu_fields/{id}', [BuFieldController::class, 'destroy']);
Route::post('bu_fields_data', [BuFieldController::class, 'bu_field_data']);



Route::get('domains', [DomainController::class, 'index']);
Route::post('domains', [DomainController::class, 'store']);
Route::get('domains/{id}', [DomainController::class, 'show']);
Route::put('domains/{id}', [DomainController::class, 'update']);
Route::delete('domains/{id}', [DomainController::class, 'destroy']);


Route::post('login', [AuthController::class, 'login']);

Route::get('designations', [DesignationController::class, 'index']);
Route::post('designations', [DesignationController::class, 'store']);
Route::get('designations/{id}', [DesignationController::class, 'show']);
Route::get('designations/company/{id}', [DesignationController::class, 'companywise']);
Route::put('designations/{id}', [DesignationController::class, 'update']);
Route::delete('designations/{id}', [DesignationController::class, 'destroy']);
Route::get('designations_t/{id}', [DesignationController::class, 'designation']);



Route::get('tickets', [TicketController::class, 'index']);
Route::post('tickets', [TicketController::class, 'store']);
Route::get('tickets/{id}', [TicketController::class, 'show']);
Route::get('tickets/company/{id}', [TicketController::class, 'companywise']);
Route::post('tickets/activity', [TicketController::class, 'saveactivity']);
Route::put('tickets/{id}', [TicketController::class, 'update']);
Route::put('tickets/vendor/{id}', [TicketController::class, 'updatevendor']);
Route::delete('tickets/{id}', [TicketController::class, 'destroy']);
Route::get('tickets/quote/{id}', [TicketController::class, 'showQuotation']);
Route::put('tickets/qoutations/{id}', [TicketController::class, 'updateqoutations']);
Route::post('tickets/qoutations', [TicketController::class, 'saveqoutations']);
Route::get('tickets/bu_fields/{id}', [TicketController::class, 'bu_fields']);


Route::get('permissions', [PermissionController::class, 'index']);
Route::post('permissions', [PermissionController::class, 'store']);
Route::get('permissions/{id}', [PermissionController::class, 'show']);
Route::put('permissions/{id}', [PermissionController::class, 'update']);
Route::delete('permissions/{id}', [PermissionController::class, 'destroy']);


Route::get('roles', [RoleController::class, 'index']);
Route::post('roles', [RoleController::class, 'store']);
Route::get('roles/{id}', [RoleController::class, 'show']);
Route::put('roles/{id}', [RoleController::class, 'update']);
Route::delete('roles/{id}', [RoleController::class, 'destroy']);


Route::get('companies',  [CompanyController::class, 'index']);
Route::post('companies',  [CompanyController::class, 'store']);
Route::get('companies/{id}',  [CompanyController::class, 'show']);
Route::put('companies/{id}',  [CompanyController::class, 'update']);
Route::delete('companies/{id}',  [CompanyController::class, 'destroy']);

Route::get('sendbasicemail/{email}/{username}',[MailController::class, 'basic_email']);
Route::get('profile/{filename}', [UserController::class,'getProfilePicture']);

Route::get('notifications',  [NotificationController::class, 'index']);
Route::post('notifications',  [NotificationController::class, 'store']);
Route::get('notifications/{id}',  [NotificationController::class, 'show']);
Route::put('notifications/{id}',  [NotificationController::class, 'update']);
Route::delete('notifications/{id}',  [NotificationController::class, 'destroy']);
Route::get('notifications/company/{id}/{u_id}',  [NotificationController::class, 'company']);

Route::get('dashboard/bu_wise_records/{c_id}/{bu_id}',  [DashboardController::class, 'buwise_records']);


Route::get('dashboard/total/{id}/{from}/{to}',  [DashboardController::class, 'totaltickets']);
Route::get('dashboard/index/{id}/{group}/{bu_id}/{user_id}',  [DashboardController::class, 'index']);
Route::get('dashboard/pending/{id}/{from}/{to}',  [DashboardController::class, 'pendingtickets']);
Route::get('dashboard/inprogress/{id}/{from}/{to}',  [DashboardController::class, 'inprogresstickets']);
Route::get('dashboard/closed/{id}/{from}/{to}',  [DashboardController::class, 'closedtickets']);
Route::get('dashboard/alltickets/{id}/{from}/{to}',  [DashboardController::class, 'alltickets']);
Route::get('dashboard/impactgraph/{id}/{from}/{to}',  [DashboardController::class, 'impactgraph']);
Route::get('dashboard/priority_graph/{id}/{from}/{to}',  [DashboardController::class, 'priority_graph']);
Route::get('dashboard/yearly_graph/{id}',  [DashboardController::class, 'yearly_graph']);
Route::get('dashboard/weekly_graph_inprogress/{id}',  [DashboardController::class, 'weekly_graph_inprogress']);
Route::get('dashboard/weekly_graph_open/{id}',  [DashboardController::class, 'weekly_graph_open']);
Route::get('dashboard/weekly_graph_completed/{id}',  [DashboardController::class, 'weekly_graph_completed']);
Route::get('dashboard/notifyemail/{id}/{name}',  [DashboardController::class, 'notifyemail']);
Route::get('dashboard/super_admin_tickets',  [DashboardController::class, 'super_admin_tickets']);
Route::get('dashboard/get_customers/{id}',  [DashboardController::class, 'get_customers']);
Route::get('dashboard/get_customers_w_t/{company_id}/{bu_id}/{cus_id}',  [DashboardController::class, 'get_customers_wise_t']);
Route::get('dashboard/created_by/{u_id}',  [DashboardController::class, 'created_by_t']);
Route::get('dashboard/assign_to/{u_id}',  [DashboardController::class, 'assign_to_me']);



Route::post('tickets_api', [App\Http\Controllers\Ticket_import_Controller::class, 'Tickets'])->name('tickets');
Route::post('bu_api', [App\Http\Controllers\Ticket_import_Controller::class, 'BU'])->name('bu_import');
Route::post('user_api', [App\Http\Controllers\Ticket_import_Controller::class, 'Users'])->name('users');
Route::post('group_api', [App\Http\Controllers\Ticket_import_Controller::class, 'Group'])->name('group');
