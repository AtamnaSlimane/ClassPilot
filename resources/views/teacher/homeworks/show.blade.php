<x-layouts::app :title="$homework->title">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-2">

                <flux:button
                    href="{{ route('teacher.homeworks.index') }}"
                    variant="ghost"
                    size="sm"
                    icon="arrow-left"
                    inset
                >
                    Homework
                </flux:button>

                <flux:heading size="xl">
                    {{ $homework->title }}
                </flux:heading>

                <div class="flex flex-wrap items-center gap-2">

                    <flux:badge color="blue">
                        {{ $homework->academyClass->name }}
                    </flux:badge>

                    @if($homework->due_date)

                        <flux:badge color="amber" icon="calendar">

                            Due {{ $homework->due_date->format('M d, Y') }}

                        </flux:badge>

                    @endif

                </div>

            </div>

            <flux:button
                href="{{ route('teacher.homeworks.edit', $homework) }}"
                variant="primary"
                icon="pencil"
            >
                Edit Homework
            </flux:button>

        </div>


        {{-- Overview --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400">
                    <flux:icon name="academic-cap" class="size-5" />
                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Class
                    </flux:text>

                    <flux:heading size="sm">
                        {{ $homework->academyClass->name }}
                    </flux:heading>

                </div>

            </flux:card>


            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 items-center justify-center rounded-xl bg-violet-50 text-violet-600 dark:bg-violet-500/10 dark:text-violet-400">
                    <flux:icon name="document-text" class="size-5" />
                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Submissions
                    </flux:text>

                    <flux:heading size="lg">
                        {{ $homework->submissions()->count() }}
                    </flux:heading>

                </div>

            </flux:card>


            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">
                    <flux:icon name="calendar" class="size-5" />
                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Due Date
                    </flux:text>

                    <flux:heading size="sm">
                        {{ $homework->due_date?->format('M d, Y') ?? 'No deadline' }}
                    </flux:heading>

                </div>

            </flux:card>

        </div>


        {{-- Content --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Instructions --}}
            <flux:card class="lg:col-span-2 dark:!bg-zinc-950 dark:border-zinc-800">

                <flux:heading size="lg">
                    Instructions
                </flux:heading>

                @if($homework->instructions)

                    <div class="mt-5 whitespace-pre-line text-zinc-700 dark:text-zinc-300">
                        {{ $homework->instructions }}
                    </div>

                @else

                    <flux:text class="mt-5 text-zinc-500">
                        No instructions provided.
                    </flux:text>

                @endif

            </flux:card>


            {{-- Attachment --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <flux:heading size="lg">
                    Attachment
                </flux:heading>

                @if($homework->file_path)

                    <div class="mt-5 flex items-center gap-3">

                        <div class="flex size-11 items-center justify-center rounded-xl bg-zinc-100 dark:bg-zinc-900">

                            <flux:icon
                                name="paper-clip"
                                class="size-5 text-zinc-500"
                            />

                        </div>

                        <div class="min-w-0">

                            <flux:text class="truncate font-medium">
                                Homework file
                            </flux:text>

                            <flux:text class="text-sm text-zinc-500">
                                Attached document
                            </flux:text>

                        </div>

                    </div>

                    <div class="mt-5 flex gap-2">

                        <flux:button
                            href="{{ route('teacher.homeworks.preview', $homework) }}"
                            target="_blank"
                            variant="primary"
                            icon="eye"
                        >
                            Preview
                        </flux:button>

                    </div>

                @else

                    <flux:text class="mt-5 text-zinc-500">
                        No attachment.
                    </flux:text>

                @endif

            </flux:card>

        </div>


        {{-- Submissions --}}
        <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

            <div class="flex items-center justify-between">

                <div>

                    <flux:heading size="lg">
                        Student Submissions
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        Review and grade submissions for this homework.
                    </flux:text>

                </div>

                <flux:button
                    href="{{ route('teacher.homeworks.submissions.index', $homework) }}"
                    variant="ghost"
                    icon="arrow-right"
                >
                    View Submissions
                </flux:button>

            </div>

        </flux:card>

    </div>

</x-layouts::app>
