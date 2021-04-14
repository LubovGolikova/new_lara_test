<?php

namespace App\Providers;

use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            QuestionRepositoryInterface::class,
            QuestionRepository::class
        );
        $this->app->bind(
            AnswerRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
