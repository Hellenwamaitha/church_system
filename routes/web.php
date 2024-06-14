<?php
use App\Http\Controllers\EventManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AccountusersController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinancialReportController;



Route::get('/', function () {
    return view('custom_layout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

});

require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/members/index', [MemberController::class, 'index'])->name('members.index');
    Route::get('/admin/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/admin/members', [MemberController::class, 'store'])->name('members.store');
    Route::get('/admin/members/{member}', [MemberController::class, 'show'])->name('members.show');
    Route::get('/admin/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/admin/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/admin/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::post('/admin/events', [EventManagementController::class, 'store'])->name('events.store');
    Route::get('/admin/events/create', [EventManagementController::class, 'create'])->name('events.create');
    Route::get('/admin/events/index', [EventManagementController::class, 'index'])->name('events.index');
    Route::put('/admin/events/{event}', [MemberController::class, 'update'])->name('events.update');
    Route::delete('/admin/events/{event}', [EventManagementController::class, 'destroy'])->name('events.destroy');



   Route::get('/admin/budget/index', [BudgetController::class, 'index'])->name('budget.index');
   Route::get('/admin/budget/create', [BudgetController::class, 'create'])->name('budget.create');
   Route::post('/admin/budget', [BudgetController::class, 'store'])->name('budget.store');
   Route::get('/admin/budget/{budget}/edit', [BudgetController::class, 'edit'])->name('buget.edit');
   Route::put('/admin/budget/{budget}', [BudgetController::class, 'update'])->name('budget.update');
   Route::post('/admin/budget', [BudgetController::class, 'store'])->name('budget.store');



   Route::get('/admin/users/create', [AccountusersController::class, 'create'])->name('users.create');
   Route::post('/admin/users', [AccountusersController::class, 'store'])->name('users.store');
   Route::delete('/admin/users/{user}', [AccountusersController::class, 'destroy'])->name('users.destroy');
   Route::get('/admin/users/index', [AccountusersController::class, 'index'])->name('users.index');



   Route::get('/finance/dashboard', [FinanceController::class, 'dashboard'])->name('finance.dashboard');
   Route::get('/finance/offeringtithes/index', [FinanceController::class, 'index'])->name('offeringtithes.index');
   Route::post('/finance/offeringtithes', [FinanceController::class, 'store'])->name('offeringtithes.store');
   Route::get('/finance/offeringtithes/import', [FinanceController::class, 'showImportForm'])->name('offeringtithes.import.post');

   Route::get('/finance/expenses/index', [ExpenseController::class, 'index'])->name('expenses.index');
   Route::post('/finance/expenses', [ExpenseController::class, 'store'])->name('expenses.store');


   Route::get('/finance/financialreport/index', [FinancialReportController::class, 'index'])->name('financialreport.index');
   Route::post('/finance/financialreport', [FinancialReportController::class, 'store'])->name('financialreport.store');
   Route::get('/finance/financialreport/filter', [FinancialReportController::class, 'filter'])->name('financialreport.filter');

});




