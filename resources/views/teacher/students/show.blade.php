<x-layouts::app :title="$student->name">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-2">

                <flux:button
                    href="{{ route('teacher.students.index') }}"
                    variant="ghost"
                    size="sm"
                    icon="arrow-left"
                    inset
                >
                    Students
                </flux:button>

                <div class="flex items-center gap-4">

                    <div
                        class="flex size-14 shrink-0 items-center justify-center rounded-full bg-blue-50 text-lg font-semibold text-blue-600 dark:bg-blue-500/10 dark:text-blue-400"
                    >
                        {{ collect(explode(' ', $student->name))
                            ->map(fn ($part) => $part[0] ?? '')
                            ->take(2)
                            ->implode('') }}
                    </div>

                    <div>

                        <flux:heading size="xl">
                            {{ $student->name }}
                        </flux:heading>

                        <flux:text class="text-zinc-500">
                            Student Profile
                        </flux:text>

                    </div>

                </div>

            </div>

        </div>


        {{-- Quick Stats --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            {{-- Status --}}
            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">

                    <flux:icon
                        name="check-circle"
                        class="size-5"
                    />

                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Status
                    </flux:text>

                    <flux:heading size="lg">
                        {{ ucfirst($student->status) }}
                    </flux:heading>

                </div>

            </flux:card>


            {{-- Classes --}}
            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-violet-600 dark:bg-violet-500/10 dark:text-violet-400">

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
                        {{ $student->classes->count() }}
                    </flux:heading>

                </div>

            </flux:card>


            {{-- Parent --}}
            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400">

                    <flux:icon
                        name="user"
                        class="size-5"
                    />

                </div>

                <div class="min-w-0">

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Parent
                    </flux:text>

                    <flux:heading
                        size="lg"
                        class="truncate"
                    >
                        {{ $student->parent?->name ?? 'None' }}
                    </flux:heading>

                </div>

            </flux:card>

        </div>


        {{-- Information --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Student Information --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <flux:heading size="lg">
                    Student Information
                </flux:heading>

                <div class="mt-5 divide-y divide-zinc-200 dark:divide-zinc-800">

                    <div class="flex items-center justify-between gap-4 py-3">

                        <flux:text class="text-zinc-500">
                            Name
                        </flux:text>

                        <flux:text class="font-medium">
                            {{ $student->name }}
                        </flux:text>

                    </div>

                    <div class="flex items-center justify-between gap-4 py-3">

                        <flux:text class="text-zinc-500">
                            Email
                        </flux:text>

                        <flux:text class="font-medium">
                            {{ $student->email }}
                        </flux:text>

                    </div>

                    <div class="flex items-center justify-between gap-4 py-3">

                        <flux:text class="text-zinc-500">
                            Phone
                        </flux:text>

                        <flux:text class="font-medium">
                            {{ $student->phone ?? 'Not provided' }}
                        </flux:text>

                    </div>

                    <div class="flex items-center justify-between gap-4 py-3">

                        <flux:text class="text-zinc-500">
                            Joined
                        </flux:text>

                        <flux:text class="font-medium">
                            {{ $student->join_date?->format('M d, Y') ?? '-' }}
                        </flux:text>

                    </div>

                    <div class="flex items-center justify-between gap-4 py-3">

                        <flux:text class="text-zinc-500">
                            Status
                        </flux:text>

                        @if($student->status === 'active')

                            <flux:badge color="emerald">
                                Active
                            </flux:badge>

                        @else

                            <flux:badge color="zinc">
                                Inactive
                            </flux:badge>

                        @endif

                    </div>

                </div>

            </flux:card>


            {{-- Parent --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <flux:heading size="lg">
                    Parent
                </flux:heading>

                @if($student->parent)

                    <div class="mt-5 flex items-center gap-4">

                        <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-amber-50 font-semibold text-amber-600 dark:bg-amber-500/10 dark:text-amber-400"
                        >
                            {{ collect(explode(' ', $student->parent->name))
                                ->map(fn ($part) => $part[0] ?? '')
                                ->take(2)
                                ->implode('') }}
                        </div>

                        <div>

                            <flux:heading size="lg">
                                {{ $student->parent->name }}
                            </flux:heading>

                            @if($student->parent->email)

                                <flux:text class="text-zinc-500">
                                    {{ $student->parent->email }}
                                </flux:text>

                            @endif

                        </div>

                    </div>

                @else

                    <div class="mt-5 rounded-xl bg-zinc-50 p-5 dark:bg-zinc-900">

                        <flux:text class="text-zinc-500">
                            No parent assigned.
                        </flux:text>

                    </div>

                @endif

            </flux:card>

        </div>


        {{-- Classes --}}
        <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

            <div class="border-b border-zinc-200 px-6 py-5 dark:border-zinc-800">

                <flux:heading size="lg">
                    Classes
                </flux:heading>

                <flux:text class="mt-1 text-zinc-500">
                    Classes this student is enrolled in.
                </flux:text>

            </div>

            @if($student->classes->count())

                <div class="divide-y divide-zinc-200 dark:divide-zinc-800">

                    @foreach($student->classes as $class)

                        <div class="flex items-center justify-between gap-4 px-6 py-4">

                            <div>

                                <flux:text class="font-medium">
                                    {{ $class->name }}
                                </flux:text>

                            </div>

                            <flux:button
                                href="{{ route('teacher.classes.show', $class) }}"
                                variant="ghost"
                                size="sm"
                                icon="chevron-right"
                                inset
                            />

                        </div>

                    @endforeach

                </div>

            @else

                <div class="flex flex-col items-center justify-center px-6 py-12 text-center">

                    <flux:icon
                        name="academic-cap"
                        class="size-8 text-zinc-400"
                    />

                    <flux:heading size="sm" class="mt-3">
                        No classes
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        This student is not enrolled in any classes.
                    </flux:text>

                </div>

            @endif

        </flux:card>


        {{-- Notes --}}
        <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

            <flux:heading size="lg">
                Notes
            </flux:heading>

            <flux:text class="mt-3 text-zinc-500">
                {{ $student->notes ?: 'No notes available.' }}
            </flux:text>

        </flux:card>

    </div>

</x-layouts::app>
