<?php

use App\Http\Controllers\Home\BlogCagetoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\footerController;
use App\Http\Controllers\Home\ProtfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\AboutController;

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

Route::get('/', function () {
    return view('frontend.index');
});
// Route::get('/dashboard', function () {
//     return view('admin.index', compact('Admin_name'));
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Admin all route
Route::middleware('auth')->group(function () {
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'Edit')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/change/password', 'Change')->name('change.password');
    Route::post('/update/password', 'Update')->name('update.password');


});
});
//home slide
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');



});
//home/about page
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImages')->name('edit.multi.image');
    Route::post('/update/multi/image/', 'UpdateMultiImages')->name('update.multi.image');
    Route::get('/delet/multi/image/{id}', 'DeletMultiImages')->name('delet.multi.image');



});

//Protfolio  all route
Route::controller(ProtfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');

    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/portfolio/details/{id}', 'Portfoliodetails')->name('portfolio.details');

     Route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');



});
//Blog   all route
Route::controller(BlogCagetoryController::class)->group(function () {
    Route::get('/all/blog/category', 'AllBlog')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlog')->name('add.blog.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', 'UpdateBlog')->name('update.blog.category');
    Route::get('/delet/blog/category/{id}', 'DeleteBlog')->name('delete.blog.category');



});

Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    Route::get('/add/blog', 'ADDBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog/{id}', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
    Route::get('/details/blog/{id}', 'DetailsBlog')->name('blog.details');

    Route::get('/categroy/blog/{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/home/blog/', 'HomeBlog')->name('home.blog');



});

Route::controller(footerController::class)->group(function () {
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    Route::post('/update/footer/{id}', 'UpdateFooter')->name('Update.footer');




});


Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.page');
    Route::post('/store/contact', 'StoreContact')->name('store.message');
    Route::get('/contact/info', 'ContactInfo')->name('Contact.info');





});







require __DIR__.'/auth.php';
