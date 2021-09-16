<?php

use App\Http\Controllers\SearchController;
use App\Http\Livewire\Admin\AdminServiceComponent;
use App\Http\Livewire\Admin\AdmiAddServiceComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategory;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\ChangeLocationComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\ServiceByCategoryComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services',ServiceByCategoryComponent::class)->name('home.services_by_category');
Route::get('service/{service_slug}',ServiceDetailsComponent::class)->name('home.service_details');

// Rout of Search Input Field
Route::get('/autocomplete',[SearchController::class,'autoComplete'])->name('autocomplete');
Route::post('/search',[SearchController::class,'searchService'])->name('searchService');

// Chang Location
Route::get('/change-location',[ChangeLocationComponent::class])->name('home.change_location');


// Route of Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});

// Route of Sprovider
Route::middleware(['auth:sanctum', 'verified','authSProvider'])->group(function () {
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
});

// Route of Admin
Route::middleware(['auth:sanctum', 'verified','authAdmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add',AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}',AdminEditServiceCategory::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services',AdminServiceComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin/service/add',AdmiAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}',AdminEditServiceComponent::class)->name('admin.edit_service');

    // Slider Route
    Route::get('/admin/slider',AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slide/add',AdminAddSliderComponent::class)->name('admin.add_slider');
    Route::get('/admin/slide/edit/{slide_id}',AdminEditSliderComponent::class)->name('admin.edit_slider');


});

