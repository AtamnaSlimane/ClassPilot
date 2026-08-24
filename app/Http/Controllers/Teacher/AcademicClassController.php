<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademyClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Policies\AcademyClassPolicy;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Gate::authorize('viewAny', AcademyClass::class);
        $classes = auth()->user()->classes()->withCount('students')->get();
        return view('teacher.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademyClass $class)
    {

        Gate::authorize('view', $class);
        $class->load('students');
        $class->loadCount('students');

        return view('teacher.classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademyClass $class)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademyClass $class)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademyClass $class)
    {
    }
}
