<div class="space-y-6">

    {{-- Search --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

        <flux:field class="flex-1">

            <div class="relative">

                <flux:input
                    type="search"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search students by name, email or phone..."
                    icon="magnifying-glass"
                />

                <div
                    wire:loading
                    wire:target="search"
                    class="absolute right-3 top-1/2 -translate-y-1/2"
                >
                    <flux:icon
                        name="arrow-path"
                        class="size-4 animate-spin text-zinc-400"
                    />
                </div>

            </div>

        </flux:field>

    </div>


    {{-- Table --}}
    <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead
                    class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-900"
                >

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                            Student
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                            Parent
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                            Classes
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                            Status
                        </th>

                        <th class="px-6 py-3 text-right">
                            <span class="sr-only">Actions</span>
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">

                    @forelse($students as $student)

                        <tr
                            wire:key="student-{{ $student->id }}"
                            class="transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-900"
                        >

                            {{-- Student --}}
                            <td class="px-6 py-4">

                                <a
                                    href="{{ route('teacher.students.show', $student) }}"
                                    class="flex items-center gap-3"
                                >

                                    <div
                                        class="flex size-9 shrink-0 items-center justify-center rounded-full bg-zinc-100 text-xs font-semibold text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300"
                                    >
                                        {{ collect(explode(' ', $student->name))
                                            ->map(fn ($part) => $part[0] ?? '')
                                            ->take(2)
                                            ->implode('') }}
                                    </div>

                                    <div class="min-w-0">

                                        <flux:text class="truncate font-medium hover:text-blue-600 dark:hover:text-blue-400">
                                            {{ $student->name }}
                                        </flux:text>

                                        @if($student->email)

                                            <flux:text class="truncate text-xs text-zinc-500">
                                                {{ $student->email }}
                                            </flux:text>

                                        @endif

                                    </div>

                                </a>

                            </td>


                            {{-- Parent --}}
                            <td class="px-6 py-4">

                                @if($student->parent)

                                    <flux:text>
                                        {{ $student->parent->name }}
                                    </flux:text>

                                @else

                                    <flux:text class="text-zinc-400">
                                        No parent
                                    </flux:text>

                                @endif

                            </td>


                            {{-- Classes --}}
                            <td class="px-6 py-4">

                                <div class="flex flex-wrap gap-1">

                                    @forelse($student->classes as $class)

                                        <flux:badge color="zinc" size="sm">
                                            {{ $class->name }}
                                        </flux:badge>

                                    @empty

                                        <flux:text class="text-zinc-400">
                                            No class
                                        </flux:text>

                                    @endforelse

                                </div>

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($student->status === 'active')

                                    <flux:badge
                                        color="emerald"
                                        icon="check-circle"
                                    >
                                        Active
                                    </flux:badge>

                                @else

                                    <flux:badge
                                        color="zinc"
                                        icon="x-circle"
                                    >
                                        Inactive
                                    </flux:badge>

                                @endif

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-4 text-right">

                                <flux:button
                                    href="{{ route('teacher.students.show', $student) }}"
                                    variant="ghost"
                                    size="sm"
                                    icon="chevron-right"
                                    inset
                                />

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-16">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div
                                        class="mb-3 flex size-12 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-900"
                                    >

                                        <flux:icon
                                            name="users"
                                            class="size-6 text-zinc-400"
                                        />

                                    </div>

                                    <flux:heading size="sm">
                                        No students found
                                    </flux:heading>

                                    <flux:text class="mt-1 text-zinc-500">
                                        Try adjusting your search.
                                    </flux:text>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($students->hasPages())

            <div class="border-t border-zinc-200 px-6 py-4 dark:border-zinc-800">

                {{ $students->links() }}

            </div>

        @endif

    </flux:card>

</div>
