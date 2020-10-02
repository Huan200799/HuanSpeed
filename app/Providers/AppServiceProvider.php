<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Suggest;
use App\Models\Favorite;
use App\Models\Product;
use App\User;
use Session;
use Auth;
use DB;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Eloquent\ChildCommentRepository;
use App\Repositories\Interfaces\ChildCommentRepositoryInterface;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Eloquent\StatisticProductRepository;
use App\Repositories\Interfaces\StatisticProductRepositoryInterface;
use App\Repositories\Eloquent\CategoriesRepository;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\SuggestUserRepository;
use App\Repositories\Interfaces\SuggestUserRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(ChildCommentRepositoryInterface::class, ChildCommentRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(StatisticProductRepositoryInterface::class, StatisticProductRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SuggestUserRepositoryInterface::class, SuggestUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cate['catelist'] = Categories::all();
        view()->share($cate);
    }
}
