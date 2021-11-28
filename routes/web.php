<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\LogoController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SeoController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SocialmediaController;
use App\Http\Controllers\admin\SSSController;
use App\Http\Controllers\admin\StatisticController as AdminStatisticController;
use App\Http\Controllers\admin\TruckController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\front\AboutController as FrontAboutController;
use App\Http\Controllers\front\AccountController;
use App\Http\Controllers\front\BlogController as FrontBlogController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CategoryController as FrontCategoryController;
use App\Http\Controllers\front\CommentController as FrontCommentController;
use App\Http\Controllers\front\ConfirmController as FrontConfirmController;
use App\Http\Controllers\front\ContactController as FrontContactController;
use App\Http\Controllers\front\FavoriteController;
use App\Http\Controllers\front\HelpController;
use App\Http\Controllers\front\HomeController as FrontHomeController;
use App\Http\Controllers\front\NewsletterController;
use App\Http\Controllers\front\OrderController as FrontOrderController;
use App\Http\Controllers\front\PaymentController;
use App\Http\Controllers\front\ProductController as FrontProductController;
use App\Http\Controllers\front\SSSController as FrontSSSController;
use App\Http\Controllers\front\TrackController;
use App\Http\Controllers\front\UserController as FrontUserController;
use App\Http\Controllers\StatisticController;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


// FRONT-END

Route::get('/',[FrontHomeController::class,'index'])->name('homepage');

Route::get('/category/{slug}/{id}',[FrontCategoryController::class,'index'])->name('category');

Route::get('/{category}/{product}/{code}',[FrontProductController::class,'index'])->name('product');

Route::get('/blogs',[FrontBlogController::class,'index'])->name('blog');

Route::get('/blogs/{slug}',[FrontBlogController::class,'detail'])->name('blog-detail');



Route::get('/about',[FrontAboutController::class,'index'])->name('about');

Route::get('/contact',[FrontContactController::class,'index'])->name('contact');
Route::post('/contact',[FrontContactController::class,'send'])->name('contact.send');

Route::get('/login',[FrontUserController::class,'loginForm'])->name('login.form');
Route::post('/login',[FrontUserController::class,'login'])->name('login');
Route::get('/register',[FrontUserController::class,'registerForm'])->name('register.form');
Route::post('/register',[FrontUserController::class,'register'])->name('register');
Route::get('/logout',[FrontUserController::class,'logout'])->name('logout');


Route::group(['prefix' => 'cart'],function(){
    Route::get('/',[CartController::class,'index'])->name('cart');
    Route::post('/add',[CartController::class,'add'])->name('cart.add');
    Route::delete('/delete/{rowid}',[CartController::class,'delete'])->name('cart.delete');
    Route::delete('/deleteAll',[CartController::class,'deleteAll'])->name('cart.deleteAll');
    Route::post('/increase/{rowId}',[CartController::class,'increase'])->name('cart.increase');
    Route::post('/decrease/{rowId}',[CartController::class,'decrease'])->name('cart.decrease');

});

Route::get('/payment',[PaymentController::class,'index'])->name('payment');
Route::post('/topay',[PaymentController::class,'toPay'])->name('toPay');

Route::get('/confirm',[FrontConfirmController::class,'index'])->name('confirm');

Route::get('myorders', [FrontOrderController::class,'index'])->name('myOrders');
Route::get('myorder/{id}', [FrontOrderController::class,'detail'])->name('myOrdersDetail');
Route::get('/return/{id}',[FrontOrderController::class,'returnOrder'])->name('returnOrder');

Route::get('/truck',[TrackController::class,'index'])->name('track');

Route::get('/account',[AccountController::class,'index'])->name('account'); 
Route::get('/user-account',[AccountController::class,'userAccount'])->name('user-account');
Route::post('/user-account',[AccountController::class,'userAccountPost'])->name('user-account.post');
Route::get('/password-account',[AccountController::class,'passwordAccount'])->name('password-account');
Route::post('/password-account',[AccountController::class,'passwordAccountPost'])->name('password-account.post');
Route::get('/address-account',[AccountController::class,'addressAccount'])->name('address-account');
Route::post('/address-account',[AccountController::class,'addressAccountPost'])->name('address-account.post');

Route::get('/help',[HelpController::class,'index'])->name('help');
Route::post('/help',[HelpController::class,'send'])->name('help.send');

Route::get('/favorites',[FavoriteController::class,'index'])->name('favorites');
Route::post('/favorites',[FavoriteController::class,'add'])->name('favorites.add');
Route::get('/favorites/{id}',[FavoriteController::class,'delete'])->name('favorites.delete');

Route::post('/search',[FrontProductController::class,'search'])->name('searcing');
Route::get('/search',[FrontProductController::class,'search'])->name('searcing');

Route::post('/comment/add',[FrontCommentController::class,'add'])->name('comment.add');
Route::get('/comment/{id}',[FrontCommentController::class,'delete'])->name('comment.delete');
Route::get('/mycomment',[FrontCommentController::class,'index'])-> name('mycomment');
Route::get('/mycomment/{id}',[FrontCommentController::class,'detail'])-> name('mycomment.detail');

Route::get('/sss',[FrontSSSController::class,'index'])->name('sss');

Route::get('/order/back',[FrontOrderController::class,'backOrder'])->name('order.back');

Route::post('/newsletter',[NewsletterController::class,'add'])->name('newsletter');

// ADMİN PANEL

Route::group(['prefix' => 'admin'],function(){

    Route::redirect('/','/admin/login');    
    Route::match(['get','post'],'/login',[UserController::class,'login'])->name('admin.login');
    Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');
    
    Route::group(['middleware' => 'auth' ] , function(){
        
        Route::get('/dashboard', [HomeController::class,'index'])->name('admin.home');
        Route::get('/delete',[HomeController::class,'visitorDelete'])->name('admin.visitor.delete');    

        Route::group(['prefix'=>'category'],function(){
            Route::get('/', [CategoryController::class,'index'])->name('admin.category');
            Route::get('/create/add', [CategoryController::class,'create'])->name('admin.category.create');
            Route::post('/create', [CategoryController::class,'create'])->name('admin.category.created');
            Route::get('/edit/{slug}', [CategoryController::class,'edit'])->name('admin.category.edit');
            Route::post('/edit/{slug}', [CategoryController::class,'save'])->name('admin.category.save');
            Route::get('/delete/{slug}', [CategoryController::class,'delete'])->name('admin.category.delete');
    
        });
        
        Route::group(['prefix' => 'product'],function(){
        
            Route::get('/', [ProductController::class,'index'])->name('admin.product');
            Route::get('/create/add', [ProductController::class,'create'])->name('admin.product.create');
            Route::post('/create', [ProductController::class,'create'])->name('admin.product.created');
            Route::get('/edit/{slug}', [ProductController::class,'edit'])->name('admin.product.edit');
            Route::post('/edit/{slug}', [ProductController::class,'save'])->name('admin.product.save');
            Route::get('/delete/{slug}', [ProductController::class,'delete'])->name('admin.product.delete');
            Route::get('/images/{slug}',[ImageController::class,'index'])->name('admin.product.img');
            Route::post('/images/{slug}',[ImageController::class,'imgSave'])->name('admin.product.img.save');
            Route::get('/images/del/{slug}',[ImageController::class,'imgDel'])->name('admin.product.img.del');
        
        });
        
        Route::group(['prefix' => 'brand'],function(){
        
            Route::get('/', [BrandController::class,'index'])->name('admin.brand');
            Route::get('/create/add', [BrandController::class,'create'])->name('admin.brand.create');
            Route::post('/create', [BrandController::class,'create'])->name('admin.brand.created');
            Route::get('/edit/{slug}', [BrandController::class,'edit'])->name('admin.brand.edit');
            Route::post('/edit/{slug}', [BrandController::class,'save'])->name('admin.brand.save');
            Route::get('/delete/{slug}', [BrandController::class,'delete'])->name('admin.brand.delete');
        
        });
        
        Route::group(['prefix' => 'branch'],function(){
        
            Route::get('/', [BranchController::class,'index'])->name('admin.branch');
            Route::get('/create/add', [BranchController::class,'create'])->name('admin.branch.create');
            Route::post('/create', [BranchController::class,'create'])->name('admin.branch.created');
            Route::get('/edit/{slug}', [BranchController::class,'edit'])->name('admin.branch.edit');
            Route::post('/edit/{slug}', [BranchController::class,'save'])->name('admin.branch.save');
            Route::get('/delete/{slug}', [BranchController::class,'delete'])->name('admin.branch.delete');
        
        });
        
        Route::group(['prefix' => 'about'],function(){
        
            Route::get('/', [AboutController::class,'index'])->name('admin.about');
            Route::post('/{id}', [AboutController::class,'post'])->name('admin.about.post');
        
        });
        
        Route::group(['prefix' => 'blog'],function(){
        
            Route::get('/', [BlogController::class,'index'])->name('admin.blog');
            Route::get('/create/add', [BlogController::class,'create'])->name('admin.blog.create');
            Route::post('/create', [BlogController::class,'create'])->name('admin.blog.created');
            Route::get('/edit/{slug}', [BlogController::class,'edit'])->name('admin.blog.edit');
            Route::post('/edit/{slug}', [BlogController::class,'save'])->name('admin.blog.save');
            Route::get('/delete/{slug}', [BlogController::class,'delete'])->name('admin.blog.delete');
        
        
        });
        
        Route::group(['prefix' => 'contact'],function(){
        
            Route::get('/', [ContactController::class,'index'])->name('admin.contact');
            Route::post('/{id}', [ContactController::class,'post'])->name('admin.contact.post');
        
        });
        Route::group(['prefix' => 'user'],function(){
        
            Route::get('/', [UserController::class,'index'])->name('admin.user');
            Route::get('/create/add', [UserController::class,'create'])->name('admin.user.create');
            Route::post('/create', [UserController::class,'create'])->name('admin.user.created');
            Route::get('/edit/{id}', [UserController::class,'edit'])->name('admin.user.edit');
            Route::post('/edit/{id}', [UserController::class,'save'])->name('admin.user.save');
            Route::get('/delete/{id}', [UserController::class,'delete'])->name('admin.user.delete');
        
        });
        
        Route::group(['prefix' => 'logo'],function(){
        
            Route::get('/', [LogoController::class,'index'])->name('admin.logo');
            Route::post('/{id}', [LogoController::class,'logo'])->name('admin.logo.post');
        
        });
        
        Route::group(['prefix' => 'setting'],function(){
        
            Route::get('/', [SettingController::class,'index'])->name('admin.setting');
            Route::post('/', [SettingController::class,'update'])->name('admin.setting.update');
        
        });
        
        Route::group(['prefix' => 'socialmedia'],function(){
        
            Route::get('/', [SocialmediaController::class,'index'])->name('admin.socialmedia');
            Route::post('/', [SocialmediaController::class,'update'])->name('admin.socialmedia.update');
        
        });
        
        Route::group(['prefix' => 'message'],function(){
        
            Route::get('/', [MessageController::class,'index'])->name('admin.message');
            Route::get('/read/{id}', [MessageController::class,'read'])->name('admin.message.read');
            Route::get('/delete/{id}', [MessageController::class,'delete'])->name('admin.message.delete');
        
        
        });
        
        Route::group(['prefix' => 'comment'],function(){

            Route::get('/', [CommentController::class,'index'])->name('admin.comment');
            Route::get('/read/{id}', [CommentController::class,'read'])->name('admin.comment.read');
            Route::get('/delete/{id}', [CommentController::class,'delete'])->name('admin.comment.delete');
        
        });
        
        Route::group(['prefix' => 'statistic'],function(){
        
            Route::get('/', [AdminStatisticController::class,'index'])->name('admin.statistic');
        
        });
        
        Route::group(['prefix' => 'order'],function(){
        
            Route::get('/', [OrderController::class,'index'])->name('admin.order');
            Route::get('/detail/{id}', [OrderController::class,'detail'])->name('admin.order.detail');
            Route::post('/detail/{id}', [OrderController::class,'save'])->name('admin.order.save');
            Route::get('/delete/{id}', [OrderController::class,'deleteOrder'])->name('admin.order.delete');
        }); 
        
        Route::group(['prefix' => 'return'],function(){
            
            Route::get('/',[OrderController::class,'backOrder'])->name('admin.order.back');
            
        });
        
        

        Route::group(['prefix' => 'sss'],function(){
        
            Route::get('/', [SSSController::class,'index'])->name('admin.sss');
            Route::get('/create/add', [SSSController::class,'create'])->name('admin.sss.create');
            Route::post('/create', [SSSController::class,'create'])->name('admin.sss.created');
            Route::get('/edit/{id}', [SSSController::class,'edit'])->name('admin.sss.edit');
            Route::post('/edit/{id}', [SSSController::class,'save'])->name('admin.sss.save');
            Route::get('/delete/{id}', [SSSController::class,'delete'])->name('admin.sss.delete');

        });
        
        Route::group(['prefix' => 'newsletter'],function(){
            Route::get('/', [AdminNewsletterController::class,'index'])->name('admin.newsletter');
            Route::get('/create/add', [AdminNewsletterController::class,'create'])->name('admin.newsletter.create');
            Route::post('/create', [AdminNewsletterController::class,'create'])->name('admin.newsletter.created');
            Route::get('/edit/{id}', [AdminNewsletterController::class,'edit'])->name('admin.newsletter.edit');
            Route::post('/edit/{id}', [AdminNewsletterController::class,'save'])->name('admin.newsletter.save');
            Route::get('/delete/{id}', [AdminNewsletterController::class,'delete'])->name('admin.newsletter.delete');
        });

        Route::group(['prefix' => 'truck'],function(){
            Route::get('/',[TruckController::class,'index'])->name('admin.truck');
            Route::post('/update',[TruckController::class,'update'])->name('admin.truck.update');
        });

        Route::group(['prefix' => 'seo'],function(){
            Route::get('/',[SeoController::class,'index'])->name('admin.seo');
            Route::post('/login/update',[SeoController::class,'login'])->name('admin.seo.login');
            Route::post('/register/update',[SeoController::class,'register'])->name('admin.seo.register');
            Route::post('/sss/update',[SeoController::class,'sss'])->name('admin.seo.sss');
            Route::post('/blog/update',[SeoController::class,'blog'])->name('admin.seo.blog');
        });

    });

});