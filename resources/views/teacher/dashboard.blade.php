<x-layouts::app :title="__('Dashboard')">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-1">

                <flux:heading size="xl">
                    Welcome back, {{ auth()->user()->name }}
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Here's an overview of your classes and students.
                </flux:text>

            </div>

            <div class="flex gap-2">

                <flux:button
                    href="{{ route('teacher.homeworks.create') }}"
                    variant="primary"
                    icon="plus"
                >
                    Add Homework
                </flux:button>

            </div>

        </div>


        {{-- Statistics --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Students --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex items-center gap-4">

                    <div class="flex size-11 shrink-0 items-center justify-center rounded-xl
                                bg-blue-50 text-blue-600
                                dark:bg-blue-500/10 dark:text-blue-400">

                        <flux:icon
                            name="users"
                            class="size-5"
                        />

                    </div>

                    <div>

                        <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                            Students
                        </flux:text>

                        <flux:heading size="lg">
                            {{ $totalStudents ?? '—' }}
                        </flux:heading>

                    </div>

                </div>

            </flux:card>


            {{-- Classes --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex items-center gap-4">

                    <div class="flex size-11 shrink-0 items-center justify-center rounded-xl
                                bg-emerald-50 text-emerald-600
                                dark:bg-emerald-500/10 dark:text-emerald-400">

                        <flux:icon
                            name="academic-cap"
                            class="size-5"
                        />

                    </div>

                    <div>

                        <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                            Classes
                        </flux:text>

                        <flux:heading size="lg">
                            {{ $totalClasses ?? '—' }}
                        </flux:heading>

                    </div>

                </div>

            </flux:card>


            {{-- Homework --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex items-center gap-4">

                    <div class="flex size-11 shrink-0 items-center justify-center rounded-xl
                                bg-amber-50 text-amber-600
                                dark:bg-amber-500/10 dark:text-amber-400">

                        <flux:icon
                            name="document-text"
                            class="size-5"
                        />

                    </div>

                    <div>

                        <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                            Homework
                        </flux:text>

                        <flux:heading size="lg">
                            {{ $totalHomeworks ?? '—' }}
                        </flux:heading>

                    </div>

                </div>

            </flux:card>


            {{-- Pending submissions --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex items-center gap-4">

                    <div class="flex size-11 shrink-0 items-center justify-center rounded-xl
                                bg-red-50 text-red-600
                                dark:bg-red-500/10 dark:text-red-400">

                        <flux:icon
                            name="clock"
                            class="size-5"
                        />

                    </div>

                    <div>

                        <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                            To Review
                        </flux:text>

                        <flux:heading size="lg">
                            {{ $pendingSubmissionsCount ?? '—' }}
                        </flux:heading>

                    </div>

                </div>

            </flux:card>

        </div>


        {{-- Main content --}}
        <div class="grid gap-6 lg:grid-cols-3">


            {{-- Classes --}}
            <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800 lg:col-span-2">

                <div class="flex items-center justify-between border-b border-zinc-200 p-6 dark:border-zinc-800">

                    <div>

                        <flux:heading size="lg">
                            My Classes
                        </flux:heading>

                        <flux:text class="mt-1 text-zinc-500">
                            Your assigned classes and enrollment.
                        </flux:text>

                    </div>

                    <flux:button
                        href="{{ route('teacher.classes.index') }}"
                        variant="ghost"
                        size="sm"
                        icon="arrow-right"
                        icon-trailing
                    >
                        View all
                    </flux:button>

                </div>


                @forelse($classes ?? [] as $class)

                    @php
                        $percentage = $class->capacity > 0
                            ? min(100, round(($class->students_count / $class->capacity) * 100))
                            : 0;

                        $barColor = match (true) {
                            $percentage >= 100 => 'bg-red-500',
                            $percentage >= 75 => 'bg-amber-500',
                            default => 'bg-emerald-500',
                        };
                    @endphp


                    <div class="border-b border-zinc-100 p-6 last:border-0 dark:border-zinc-800">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <a
                                    href="{{ route('teacher.classes.show', $class) }}"
                                    class="font-medium text-zinc-900 hover:text-blue-600 hover:underline dark:text-zinc-100 dark:hover:text-blue-400"
                                >
                                    {{ $class->name }}
                                </a>

                                <flux:text class="mt-1 text-sm text-zinc-500">
                                    {{ $class->students_count }} students
                                </flux:text>

                            </div>


                            @if($percentage >= 100)

                                <flux:badge
                                    color="red"
                                    icon="x-circle"
                                >
                                    Full
                                </flux:badge>

                            @elseif($percentage >= 75)

                                <flux:badge
                                    color="amber"
                                >
                                    Nearly full
                                </flux:badge>

                            @else

                                <flux:badge
                                    color="emerald"
                                >
                                    Available
                                </flux:badge>

                            @endif

                        </div>


                        <div class="mt-4">

                            <div class="mb-2 flex items-center justify-between">

                                <flux:text class="text-xs text-zinc-500">
                                    Enrollment
                                </flux:text>

                                <flux:text class="text-xs font-medium">
                                    {{ $class->students_count }} / {{ $class->capacity }}
                                </flux:text>

                            </div>


                            <div class="h-2 overflow-hidden rounded-full bg-zinc-100 dark:bg-zinc-800">

                                <div
                                    class="h-full rounded-full {{ $barColor }}"
                                    style="width: {{ $percentage }}%"
                                ></div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="p-10 text-center">

                        <flux:icon
                            name="academic-cap"
                            class="mx-auto size-8 text-zinc-400"
                        />

                        <flux:heading size="sm" class="mt-3">
                            No classes assigned
                        </flux:heading>

                        <flux:text class="mt-1 text-zinc-500">
                            You don't have any classes assigned yet.
                        </flux:text>

                    </div>

                @endforelse

            </flux:card>


            {{-- Upcoming Homework --}}
            <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="border-b border-zinc-200 p-6 dark:border-zinc-800">

                    <flux:heading size="lg">
                        Upcoming Homework
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        Your next deadlines.
                    </flux:text>

                </div>


                <div>

                    @forelse($upcomingHomeworks ?? [] as $homework)

                        <a
                            href="{{ route('teacher.homeworks.show', $homework) }}"
                            class="block border-b border-zinc-100 p-5 transition-colors last:border-0 hover:bg-zinc-50 dark:border-zinc-800 dark:hover:bg-zinc-900"
                        >

                            <div class="flex items-start gap-3">

                                <div class="flex size-9 shrink-0 items-center justify-center rounded-lg
                                            bg-blue-50 text-blue-600
                                            dark:bg-blue-500/10 dark:text-blue-400">

                                    <flux:icon
                                        name="document-text"
                                        class="size-4"
                                    />

                                </div>

                                <div class="min-w-0 flex-1">

                                    <flux:text class="truncate font-medium text-zinc-900 dark:text-zinc-100">
                                        {{ $homework->title }}
                                    </flux:text>

                                    <flux:text class="mt-1 text-xs text-zinc-500">
                                        {{ $homework->academyClass->name }}
                                    </flux:text>

                                    @if($homework->due_date)

                                        <flux:text class="mt-2 text-xs">

                                            Due
                                            {{ $homework->due_date->format('M d, Y') }}

                                        </flux:text>

                                    @endif

                                </div>

                            </div>

                        </a>

                    @empty

                        <div class="p-8 text-center">

                            <flux:icon
                                name="check-circle"
                                class="mx-auto size-8 text-emerald-500"
                            />

                            <flux:heading size="sm" class="mt-3">
                                No upcoming homework
                            </flux:heading>

                            <flux:text class="mt-1 text-zinc-500">
                                You're all caught up.
                            </flux:text>

                        </div>

                    @endforelse

                </div>

            </flux:card>

        </div>
{{-- Pending Submissions --}}
@php
    $hasPendingSubmissions = ($pendingSubmissions ?? collect())->isNotEmpty();
@endphp

<flux:card
    class="overflow-hidden p-0
    {{ $hasPendingSubmissions
        ? 'border-amber-200 dark:border-amber-900/50 dark:!bg-zinc-950'
        : 'border-emerald-200 dark:border-emerald-900/50 dark:!bg-zinc-950'
    }}"
>

    <div
        class="flex flex-col gap-4 border-b p-6 sm:flex-row sm:items-center sm:justify-between
        {{ $hasPendingSubmissions
            ? 'border-amber-200 bg-amber-50/50 dark:border-amber-900/50 dark:bg-amber-500/5'
            : 'border-emerald-200 bg-emerald-50/50 dark:border-emerald-900/50 dark:bg-emerald-500/5'
        }}"
    >

        <div class="flex items-center gap-3">

            {{-- Dynamic icon --}}
            <div
                class="flex size-10 shrink-0 items-center justify-center rounded-xl
                {{ $hasPendingSubmissions
                    ? 'bg-amber-100 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400'
                    : 'bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400'
                }}"
            >

                <flux:icon
                    name="{{ $hasPendingSubmissions ? 'clock' : 'check' }}"
                    class="size-5"
                />

            </div>


            {{-- Dynamic heading --}}
            <div>

                @if($hasPendingSubmissions)

                    <flux:heading size="lg">
                        Needs Review
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        Student submissions waiting for your feedback.
                    </flux:text>

                @else

                    <flux:heading size="lg" class="text-emerald-600 dark:text-emerald-400">
                        Everything is Reviewed
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        You have no student submissions waiting for review.
                    </flux:text>

                @endif

            </div>

        </div>

    </div>
    <div class="overflow-x-auto">

        @foreach($pendingSubmissions ?? [] as $submission)

            <a
                href="{{ route(
                    'teacher.homeworks.submissions.show',
                    [$submission->homework, $submission]
                ) }}"
                class="block border-b border-zinc-100 p-5 transition-colors last:border-0
                       hover:bg-amber-50/50
                       dark:border-zinc-800 dark:hover:bg-amber-500/5"
            >

                <div class="flex items-center gap-4">

                    {{-- Student avatar --}}
                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full
                                bg-zinc-100 text-sm font-semibold text-zinc-600
                                dark:bg-zinc-800 dark:text-zinc-300">

                        {{ collect(explode(' ', $submission->student->name))
                            ->map(fn ($part) => $part[0] ?? '')
                            ->take(2)
                            ->implode('') }}

                    </div>


                    {{-- Main information --}}
                    <div class="min-w-0 flex-1">

                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:gap-2">

                            <flux:text class="font-medium text-zinc-900 dark:text-zinc-100">
                                {{ $submission->student->name }}
                            </flux:text>

                            <span class="hidden text-zinc-300 dark:text-zinc-700 sm:inline">
                                /
                            </span>

                            <flux:text class="truncate text-zinc-600 dark:text-zinc-400">
                                {{ $submission->homework->title }}
                            </flux:text>

                        </div>

                        <flux:text class="mt-1 text-xs text-zinc-500">
                            {{ $submission->homework->academyClass->name }}
                            · Submitted {{ $submission->created_at->diffForHumans() }}
                        </flux:text>

                    </div>


                    {{-- Status --}}
                    <div class="hidden sm:block">

                        <flux:badge color="amber">
                            Needs review
                        </flux:badge>

                    </div>


                    {{-- Arrow --}}
                    <flux:icon
                        name="chevron-right"
                        class="size-5 shrink-0 text-zinc-400"
                    />

                </div>

            </a>


        @endforeach

    </div>

</flux:card>

        {{-- Recent submissions --}}
        <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

            <div class="flex items-center justify-between border-b border-zinc-200 p-6 dark:border-zinc-800">

                <div>

                    <flux:heading size="lg">
                        Recent Submissions
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        Recently submitted student work.
                    </flux:text>

                </div>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-900">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Student
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Homework
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Class
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Submitted
                            </th>

                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">

                        @forelse($recentSubmissions ?? [] as $submission)

                            <tr class="transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-900">

                                <td class="px-6 py-4">

                                    <span class="font-medium">
                                        {{ $submission->student->name }}
                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    <a
                                        href="{{ route('teacher.homeworks.show', $submission->homework) }}"
                                        class="text-zinc-700 hover:text-blue-600 hover:underline dark:text-zinc-300 dark:hover:text-blue-400"
                                    >
                                        {{ $submission->homework->title }}
                                    </a>

                                </td>


                                <td class="px-6 py-4 text-zinc-500">

                                    {{ $submission->homework->academyClass->name }}

                                </td>


                                <td class="px-6 py-4 text-zinc-500">

                                    {{ $submission->created_at->diffForHumans() }}

                                </td>


                                <td class="px-6 py-4 text-right">

                                    @if($submission->grade !== null)

                                        <flux:badge color="emerald">
                                            Graded · {{ $submission->grade }}/20
                                        </flux:badge>

                                    @else

                                        <flux:badge color="amber">
                                            Needs review
                                        </flux:badge>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-12 text-center">

                                    <flux:icon
                                        name="inbox"
                                        class="mx-auto size-8 text-zinc-400"
                                    />

                                    <flux:heading size="sm" class="mt-3">
                                        No submissions yet
                                    </flux:heading>

                                    <flux:text class="mt-1 text-zinc-500">
                                        Student submissions will appear here.
                                    </flux:text>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </flux:card>


        {{-- Quick Actions --}}
        <div>

            <flux:heading size="lg">
                Quick Actions
            </flux:heading>

            <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                <flux:button
                    href="{{ route('teacher.classes.index') }}"
                    variant="filled"
                    icon="academic-cap"
                    class="justify-start"
                >
                    My Classes
                </flux:button>

                <flux:button
                    href="{{ route('teacher.students.index') }}"
                    variant="filled"
                    icon="users"
                    class="justify-start"
                >
                    My Students
                </flux:button>

                <flux:button
                    href="{{ route('teacher.homeworks.index') }}"
                    variant="filled"
                    icon="document-text"
                    class="justify-start"
                >
                    Homework
                </flux:button>

                <flux:button
                    href="{{ route('teacher.homeworks.create') }}"
                    variant="filled"
                    icon="plus"
                    class="justify-start"
                >
                    Create Homework
                </flux:button>

            </div>

        </div>

    </div>

</x-layouts::app>
