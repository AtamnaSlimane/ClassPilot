<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademyClass;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Policies\AcademyClassPolicy;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

     $teacher=auth()->user();

        Gate::authorize('viewAny', AcademyClass::class);

        $classes = $teacher->classes()->withCount('students')->get();
        $totalClasses=$classes->count();

  $totalStudents = $teacher->students()
        ->count();

        $homeworks = $classes
            ->flatMap->homeworks;


        $totalHomeworks = $homeworks->count();

    $pendingSubmissions = $homeworks
            ->flatMap(function ($homework) {
                return $homework->submissions;
            })
            ->whereNull('grade')
            ->values();
$pendingSubmissionsCount = $pendingSubmissions->count();
   $upcomingHomeworks = $homeworks
            ->filter(function ($homework) {
                return $homework->due_date &&
                    $homework->due_date->isFuture();
            })
            ->sortBy('due_date')
            ->take(5);

   $recentSubmissions = $homeworks
            ->flatMap(function ($homework) {

                return $homework->submissions->map(
                    function ($submission) use ($homework) {
                        $submission->setRelation(
                            'homework',
                            $homework
                        );

                        return $submission;
                    }
                );

            })
            ->sortByDesc('created_at')
            ->take(10);

        return view('teacher.dashboard', compact('classes','totalStudents','totalClasses','totalHomeworks','pendingSubmissions','upcomingHomeworks','recentSubmissions','pendingSubmissionsCount'));
    }
}
