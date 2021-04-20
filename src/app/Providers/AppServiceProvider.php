<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;
use App\Services\QuestionService;
use App\Services\AnswerService;
use App\Services\RoleService;
use App\Services\MailService;
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
        //
    }
}
