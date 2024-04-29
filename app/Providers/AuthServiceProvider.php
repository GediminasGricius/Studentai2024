<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use App\Policies\LecturerPolicy;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Lecturer::class=>LecturerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-student',function (User $user){

            return $user->type==1 || $user->type==2;
        });

        Gate::define('edit-student',function (User $user){

            return $user->type==1 || $user->type==2;
        });

        Gate::define('delete-student', function (User $user){
            return $user->type==2 ;
        });
    }
}
