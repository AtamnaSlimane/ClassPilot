<x-layouts::app :title="__('Homework')">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-2">

                <flux:button
                    href="{{ route('teacher.dashboard') }}"
                    variant="ghost"
                    size="sm"
                    icon="arrow-left"
                    inset
                >
                    Dashboard
                </flux:button>

                <flux:heading size="xl">
                    Homework
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Manage homework assignments for your classes.
                </flux:text>

            </div>

            <flux:button
                href="{{ route('teacher.homeworks.create') }}"
                variant="primary"
                icon="plus"
            >
                Create Homework
            </flux:button>

        </div>


        {{-- Success message --}}
        @if(session('success'))

            <flux:card class="border-emerald-200 dark:border-emerald-900/50 dark:!bg-zinc-950">

                <div class="flex items-center gap-3">

                    <div class="flex size-9 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">
                        <flux:icon name="check-circle" class="size-5" />
                    </div>

                    <flux:text>
                        {{ session('success') }}
                    </flux:text>

                </div>

            </flux:card>

        @endif


        {{-- Homework --}}
        <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

            <div class="border-b border-zinc-200 px-6 py-5 dark:border-zinc-800">

                <div class="flex items-center justify-between">

                    <div>

                        <flux:heading size="lg">
                            Assignments
                        </flux:heading>

                        <flux:text class="mt-1 text-zinc-500">
                            Homework assigned to your classes.
                        </flux:text>

                    </div>

                    <flux:badge color="zinc">
                        {{ $homeworks->count() }}
                        assignments
                    </flux:badge>

                </div>

            </div>


            @if($homeworks->count())

                <div class="divide-y divide-zinc-200 dark:divide-zinc-800">

                    @foreach($homeworks as $homework)

                        <div class="flex items-center justify-between gap-4 px-6 py-5 transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-900">

                            <div class="flex min-w-0 items-center gap-4">

                                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400">
                                    <flux:icon name="document-text" class="size-5" />
                                </div>

                                <div class="min-w-0">

                                    <flux:heading size="sm" class="truncate">
                                        {{ $homework->title }}
                                    </flux:heading>

                                    <div class="mt-1 flex flex-wrap items-center gap-2">

                                        <flux:badge color="zinc" size="sm">
                                            {{ $homework->academyClass->name }}
                                        </flux:badge>

                                        @if($homework->due_date)

                                            <flux:text class="text-sm text-zinc-500">
                                                Due {{ $homework->due_date->format('M d, Y') }}
                                            </flux:text>

                                        @endif

                                    </div>

                                </div>

                            </div>


                            <flux:button
                                href="{{ route('teacher.homeworks.show', $homework) }}"
                                variant="ghost"
                                size="sm"
                                icon="chevron-right"
                                inset
                            />

                        </div>

                    @endforeach

                </div>

            @else

                <div class="flex flex-col items-center justify-center px-6 py-16 text-center">

                    <div class="mb-3 flex size-12 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-900">

                        <flux:icon
                            name="document-text"
                            class="size-6 text-zinc-400"
                        />

                    </div>

                    <flux:heading size="sm">
                        No homework yet
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        Create your first homework assignment.
                    </flux:text>

                    <flux:button
                        href="{{ route('teacher.homeworks.create') }}"
                        variant="ghost"
                        class="mt-4"
                        icon="plus"
                    >
                        Create Homework
                    </flux:button>

                </div>

            @endif

        </flux:card>

    </div>

</x-layouts::app>
