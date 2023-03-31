<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\EmailSubscriberController;
use App\Http\Controllers\Admin\ManageSeoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\HeaderImageController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\PricingItemController;
use App\Http\Controllers\Admin\TalkController;
use App\Http\Controllers\TrustedController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UsefulLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/',[PagenameController::class,'home']);
Route::get('/', function () {
    if(Auth::check())
    {
         return redirect('/admin/home');
    }
    else
    {
     return view('auth.adminLogin');
    }
})->name('adminLogin');


Route::get('/login',[LoginController::class,'loginform'])->name('login');

Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::post('logout', [HomeController::class, 'adminLogout'])->name('admin.logout');
    Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    Route::get('admin/slider', [SliderController::class, 'slider'])->name('admin.slider');
    Route::get('admin/slider/add', [SliderController::class, 'add'])->name('admin.addslider');
    Route::post('admin/slider/store', [SliderController::class, 'store'])->name('admin.storeslider');
    Route::get('admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.editslider');
    Route::POST('admin/slider/update', [SliderController::class, 'update'])->name('admin.updateslider');
    Route::POST('admin/slider/delete', [SliderController::class, 'delete'])->name('admin.deleteslider');


    Route::get('admin/trusted_by', [TrustedController::class, 'trusted_by'])->name('admin.trusted_by');
    Route::get('admin/trusted_by/add', [TrustedController::class, 'add'])->name('admin.addtrusted_by');
    Route::post('admin/trusted_by/store', [TrustedController::class, 'store'])->name('admin.storetrusted_by');
    Route::get('admin/trusted_by/edit/{id}', [TrustedController::class, 'edit'])->name('admin.edittrusted_by');
    Route::POST('admin/trusted_by/update', [TrustedController::class, 'update'])->name('admin.updatetrusted_by');
    Route::POST('admin/trusted_by/delete', [TrustedController::class, 'delete'])->name('admin.deletetrusted_by');

    Route::get('admin/about_us', [AboutUsController::class, 'aboutus'])->name('admin.aboutus');
    Route::post('admin/about_us/update', [AboutUsController::class, 'updateaboutus'])->name('admin.updateaboutus');

    Route::get('admin/talk', [TalkController::class, 'talk'])->name('admin.talk');
    Route::post('admin/talk/update', [TalkController::class, 'updatetalk'])->name('admin.updatetalk');
    
    Route::get('admin/header_image', [HeaderImageController::class, 'header_image'])->name('admin.header_image');
    Route::post('admin/header_image/update', [HeaderImageController::class, 'updateheader_image'])->name('admin.updateheader_image');

    Route::get('admin/service_category', [ServiceCategoryController::class, 'service_category'])->name('admin.service_category');
    Route::get('admin/service/category/add', [ServiceCategoryController::class, 'service_category_add'])->name('admin.service_category_add');
    Route::post('admin/service_category/store', [ServiceCategoryController::class, 'service_category_store'])->name('admin.service_category_store');
    Route::get('admin/service_category/edit/{id}', [ServiceCategoryController::class, 'service_category_edit'])->name('admin.service_category_edit');
    Route::post('admin/service_category/update', [ServiceCategoryController::class, 'service_category_update'])->name('admin.service_category_update');
    Route::post('admin/service_category/delete', [ServiceCategoryController::class, 'service_category_delete'])->name('admin.service_category_delete');

    // admin/pricing
    Route::get('admin/pricing', [PricingController::class, 'pricing'])->name('admin.pricing');
    Route::get('admin/pricing/add', [PricingController::class, 'pricing_add'])->name('admin.pricing_add');
    Route::post('admin/pricing/store', [PricingController::class, 'pricing_store'])->name('admin.pricing_store');
    Route::get('admin/pricing/edit/{id}', [PricingController::class, 'pricing_edit'])->name('admin.pricing_edit');
    Route::post('admin/pricing/update', [PricingController::class, 'pricing_update'])->name('admin.pricing_update');
    Route::post('admin/pricing/delete', [PricingController::class, 'pricing_delete'])->name('admin.pricing_delete');

     // admin/pricing_items
     Route::get('admin/pricing_items', [PricingItemController::class, 'pricing_items'])->name('admin.pricing_items');
     Route::get('admin/pricing_items/add', [PricingItemController::class, 'pricing_items_add'])->name('admin.pricing_items_add');
     Route::post('admin/pricing_items/store', [PricingItemController::class, 'pricing_items_store'])->name('admin.pricing_items_store');
     Route::get('admin/pricing_items/edit/{id}', [PricingItemController::class, 'pricing_items_edit'])->name('admin.pricing_items_edit');
     Route::post('admin/pricing_items/update', [PricingItemController::class, 'pricing_items_update'])->name('admin.pricing_items_update');
     Route::post('admin/pricing_items/delete', [PricingItemController::class, 'pricing_items_delete'])->name('admin.pricing_items_delete');


    Route::get('admin/service', [ServiceController::class, 'service'])->name('admin.service');
    Route::get('admin/service/add', [ServiceController::class, 'add'])->name('admin.service_add');
    Route::post('admin/service/store', [ServiceController::class, 'store'])->name('admin.service_store');
    Route::get('admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service_edit');
    Route::post('admin/service/update', [ServiceController::class, 'update'])->name('admin.service_update');
    Route::post('admin/service/delete', [ServiceController::class, 'delete'])->name('admin.service_delete');
    Route::post('admin/service/chatGptData', [ServiceController::class, 'chatGptData'])->name('admin.chatGptData');


    Route::get('admin/contents', [ContentController::class, 'contents'])->name('admin.contents');
    Route::post('admin/content/update', [ContentController::class, 'update'])->name('admin.content_update');
   


    Route::get('admin/social_media', [SocialMediaController::class, 'social_media'])->name('admin.social_media');
    Route::get('admin/social_media/add', [SocialMediaController::class, 'add'])->name('admin.social_media_add');
    Route::post('admin/social_media/store', [SocialMediaController::class, 'store'])->name('admin.social_media_store');
    Route::get('admin/social_media/edit/{id}', [SocialMediaController::class, 'edit'])->name('admin.social_media_edit');
    Route::post('admin/social_media/update', [SocialMediaController::class, 'update'])->name('admin.social_media_update');
    Route::post('admin/social_media/delete', [SocialMediaController::class, 'delete'])->name('admin.social_media_delete');

    Route::get('admin/portfolio-category', [ PortfolioCategoryController::class, 'portfolio_category'])->name('admin.portfolio_category');
    Route::get('admin/portfolio-category/add', [ PortfolioCategoryController::class, 'add'])->name('admin.portfolio_category_add');
    Route::post('admin/portfolio-category/store', [ PortfolioCategoryController::class, 'store'])->name('admin.portfolio_category_store');
    Route::get('admin/portfolio-category/edit/{id}', [ PortfolioCategoryController::class, 'edit'])->name('admin.portfolio_category_edit');
    Route::post('admin/portfolio-category/update', [ PortfolioCategoryController::class, 'update'])->name('admin.portfolio_category_update');
    Route::post('admin/portfolio-category/delete', [ PortfolioCategoryController::class, 'delete'])->name('admin.portfolio_category_delete');

    Route::get('admin/portfolio', [PortfolioController::class, 'portfolio'])->name('admin.portfolio');
    Route::get('admin/portfolio/add', [PortfolioController::class, 'add'])->name('admin.portfolio_add');
    Route::post('admin/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio_store');
    Route::get('admin/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio_edit');
    Route::post('admin/portfolio/update', [PortfolioController::class, 'update'])->name('admin.portfolio_update');
    Route::post('admin/portfolio/delete', [PortfolioController::class, 'delete'])->name('admin.portfolio_delete');


    Route::get('admin/blog-category', [ BlogCategoryController::class, 'blog_category'])->name('admin.blog_category');
    Route::get('admin/blog-category/add', [ BlogCategoryController::class, 'add'])->name('admin.blog_category_add');
    Route::post('admin/blog-category/store', [ BlogCategoryController::class, 'store'])->name('admin.blog_category_store');
    Route::get('admin/blog-category/edit/{id}', [ BlogCategoryController::class, 'edit'])->name('admin.blog_category_edit');
    Route::post('admin/blog-category/update', [ BlogCategoryController::class, 'update'])->name('admin.blog_category_update');
    Route::post('admin/blog-category/delete', [ BlogCategoryController::class, 'delete'])->name('admin.blog_category_delete');


    Route::get('admin/blog', [BlogController::class, 'blog'])->name('admin.blog');
    Route::get('admin/blog/add', [BlogController::class, 'add'])->name('admin.blog_add');
    Route::post('admin/blog/store', [BlogController::class, 'store'])->name('admin.blog_store');
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog_edit');
    Route::post('admin/blog/update', [BlogController::class, 'update'])->name('admin.blog_update');
    Route::post('admin/blog/delete', [BlogController::class, 'delete'])->name('admin.blog_delete');


    Route::get('admin/testimonial', [TestimonialsController::class, 'testimonial'])->name('admin.testimonial');
    Route::get('admin/testimonial/add', [TestimonialsController::class, 'add'])->name('admin.testimonial_add');
    Route::post('admin/testimonial/store', [TestimonialsController::class, 'store'])->name('admin.testimonial_store');
    Route::get('admin/testimonial/edit/{id}', [TestimonialsController::class, 'edit'])->name('admin.testimonial_edit');
    Route::post('admin/testimonial/update', [TestimonialsController::class, 'update'])->name('admin.testimonial_update');
    Route::post('admin/testimonial/delete', [TestimonialsController::class, 'delete'])->name('admin.testimonial_delete');



    Route::get('admin/team', [TeamController::class, 'team'])->name('admin.team');
    Route::get('admin/team/add', [TeamController::class, 'add'])->name('admin.team_add');
    Route::post('admin/team/store', [TeamController::class, 'store'])->name('admin.team_store');
    Route::get('admin/team/edit/{id}', [TeamController::class, 'edit'])->name('admin.team_edit');
    Route::post('admin/team/update', [TeamController::class, 'update'])->name('admin.team_update');
    Route::post('admin/team/delete', [TeamController::class, 'delete'])->name('admin.team_delete');


    Route::get('admin/statistics', [StatisticsController::class, 'statistics'])->name('admin.statistics');
    Route::get('admin/statistics/add', [StatisticsController::class, 'add'])->name('admin.statistics_add');
    Route::post('admin/statistics/store', [StatisticsController::class, 'store'])->name('admin.statistics_store');
    Route::get('admin/statistics/edit/{id}', [StatisticsController::class, 'edit'])->name('admin.statistics_edit');
    Route::post('admin/statistics/update', [StatisticsController::class, 'update'])->name('admin.statistics_update');
    Route::post('admin/statistics/delete', [StatisticsController::class, 'delete'])->name('admin.statistics_delete');

    Route::get('admin/contact', [ContactController::class, 'contact'])->name('admin.contact');
    Route::get('admin/contact/add', [ContactController::class, 'add'])->name('admin.contact_add');
    Route::post('admin/contact/store', [ContactController::class, 'store'])->name('admin.contact_store');
    Route::get('admin/contact/edit/{id}', [ContactController::class, 'edit'])->name('admin.contact_edit');
    Route::post('admin/contact/update', [ContactController::class, 'update'])->name('admin.contact_update');
    Route::post('admin/contact/delete', [ContactController::class, 'delete'])->name('admin.contact_delete');


    Route::get('admin/menu', [SettingsController::class, 'menu'])->name('admin.menu');
    Route::post('admin/menu/delete', [SettingsController::class, 'delete'])->name('admin.menu_delete');
    Route::post('admin/menu/updateMenu', [SettingsController::class, 'updateMenu'])->name('admin.updateMenu');


    Route::get('admin/general_settings', [GeneralSettingsController::class, 'general_settings'])->name('admin.general_settings');
    Route::post('admin/general_settings/update', [GeneralSettingsController::class, 'updategeneral_settings'])->name('admin.updategeneral_settings');

    Route::get('admin/contact/messages', [ContactMessageController::class, 'index'])->name('admin.contact.messages');
    Route::post('admin/contact/messages/delete', [ContactMessageController::class, 'delete'])->name('admin.contact.messages.delete');
    Route::get('admin/email/subscribers', [EmailSubscriberController::class, 'index'])->name('admin.email.subscribers');
    Route::post('admin/email/subscribers/delete', [EmailSubscriberController::class, 'delete'])->name('admin.email.subscribers.delete');


    Route::get('admin/profile', [ProfileController::class, 'profile'])->name('admin.profile');
    Route::post('admin/profile/update', [ProfileController::class, 'updateprofile'])->name('admin.updateprofile');
    Route::post('admin/profile/update/password', [ProfileController::class, 'updatepassword'])->name('admin.updateprofile');





    Route::get('admin/useful_link', [UsefulLinkController::class, 'useful_link'])->name('admin.useful_link');
    Route::get('admin/useful_link/add', [UsefulLinkController::class, 'add'])->name('admin.useful_link_add');
    Route::post('admin/useful_link/store', [UsefulLinkController::class, 'store'])->name('admin.useful_link_store');
    Route::get('admin/useful_link/edit/{id}', [UsefulLinkController::class, 'edit'])->name('admin.useful_link_edit');
    Route::post('admin/useful_link/update', [UsefulLinkController::class, 'update'])->name('admin.useful_link_update');
    Route::post('admin/useful_link/delete', [UsefulLinkController::class, 'delete'])->name('admin.useful_link_delete');

});

