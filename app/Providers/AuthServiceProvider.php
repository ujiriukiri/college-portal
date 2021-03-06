<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\School' => 'App\Policies\SchoolPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Models\Faculty' => 'App\Policies\FacultyPolicy',
        'App\Models\Department' => 'App\Policies\DepartmentPolicy',
        'App\Models\Program' => 'App\Policies\ProgramPolicy',
        'App\Models\Level' => 'App\Policies\LevelPolicy',
        'App\Models\Student' => 'App\Policies\StudentPolicy',
        'App\Models\Course' => 'App\Policies\CoursePolicy',
        'App\Models\SemesterType' => 'App\Policies\SemesterTypePolicy',
        'App\Models\Staff' => 'App\Policies\StaffPolicy',
        'App\Models\Session' => 'App\Policies\SessionPolicy',
        'App\Models\Semester' => 'App\Policies\SemesterPolicy',
        'App\Models\ChargeableService' => 'App\Policies\ChargeableServicePolicy',
        'App\Models\Chargeable' => 'App\Policies\ChargeablePolicy',
        'App\Models\ProgramCredit' => 'App\Policies\ProgramCreditPolicy',
        'App\Models\Payable' => 'App\Policies\PayablePolicy',
        'App\Models\CourseDependency' => 'App\Policies\CourseDependencyPolicy',
        'App\Models\StaffTeachCourse' => 'App\Policies\StaffTeachCoursePolicy',
        'App\Models\StudentTakesCourse' => 'App\Policies\StudentTakesCoursePolicy',
        'App\Models\GradeType' => 'App\Policies\GradeTypePolicy',
        'App\Models\Grade' => 'App\Policies\GradePolicy',
        'App\Models\ImageType' => 'App\Policies\ImageTypePolicy',
        'App\Models\Image' => 'App\Policies\ImagePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
