<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Student::class);
        $students = auth()->user()->students()->latest()->get();
        return view("teacher.students.index", compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
    public function show(Student $student)
    {

        Gate::authorize('view', $student);

        $student->load([
        'parent',
       'classes' => fn ($query) =>
            $query->where('teacher_id', auth()->user()->id),
    ]);

        return view('teacher.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
    }
}
