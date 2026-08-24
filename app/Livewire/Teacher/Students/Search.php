<?php

namespace App\Livewire\Teacher\Students;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class Search extends Component
{
 use WithPagination;

    public string $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $teacher = auth()->user();

        $students = Student::query()
            ->whereHas('teachers', function ($query) use ($teacher) {
                $query->whereKey($teacher->id);
            })
            ->with([
                'parent',
        'classes' => function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        },
            ])
            ->when($this->search, function ($query) {
                $search = $this->search;

                $query->where(function ($query) use ($search) {
                    $query->where('name', 'ILIKE', "%{$search}%")
                        ->orWhere('email', 'ILIKE', "%{$search}%")
                        ->orWhere('phone', 'ILIKE', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20);

        return view('livewire.teacher.students.search', compact('students'));
    }
}
