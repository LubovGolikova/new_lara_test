<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\QuestionService;
use App\Services\AnswerService;
use App\Services\RoleService;
use App\Services\MailService;
use App\View\Components\Aside;
use App\View\Components\Filter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('UserService',UserService::class);
        $this->app->bind('QuestionService',QuestionService::class);
        $this->app->bind('AnswerService',AnswerService::class);
        $this->app->bind('RoleService',RoleService::class);
        $this->app->bind('MailService',MailService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('package-aside', Aside::class);
        Blade::component('package-filter', Filter::class);
    }
}
