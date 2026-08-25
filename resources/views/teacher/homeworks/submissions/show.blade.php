<x-layouts::app :title="$submission->student->name">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-2">

                <flux:button
                    href="{{ route(
                        'teacher.homeworks.submissions.index',
                        $homework
                    ) }}"
                    variant="ghost"
                    size="sm"
                    icon="arrow-left"
                    inset
                >
                    Submissions
                </flux:button>

                <flux:heading size="xl">
                    {{ $submission->student->name }}
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Submission for {{ $homework->title }}
                </flux:text>

            </div>

            <flux:button
                href="{{ route(
                    'teacher.homeworks.submissions.edit',
                    [$homework, $submission]
                ) }}"
                variant="primary"
                icon="pencil"
            >
                Grade Submission
            </flux:button>

        </div>


        {{-- Stats --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400">
                    <flux:icon name="user" class="size-5" />
                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Student
                    </flux:text>

                    <flux:heading size="sm">
                        {{ $submission->student->name }}
                    </flux:heading>

                </div>

            </flux:card>


            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 items-center justify-center rounded-xl bg-violet-50 text-violet-600 dark:bg-violet-500/10 dark:text-violet-400">
                    <flux:icon name="document-text" class="size-5" />
                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Homework
                    </flux:text>

                    <flux:heading size="sm">
                        {{ $homework->title }}
                    </flux:heading>

                </div>

            </flux:card>


            <flux:card class="flex items-center gap-4 p-5 dark:!bg-zinc-950 dark:border-zinc-800">

                <div class="flex size-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">
                    <flux:icon name="academic-cap" class="size-5" />
                </div>

                <div>

                    <flux:text class="text-xs uppercase tracking-wide text-zinc-500">
                        Grade
                    </flux:text>

                    <flux:heading size="lg">
                        {{ $submission->grade !== null
                            ? $submission->grade . '/20'
                            : 'Not graded' }}
                    </flux:heading>

                </div>

            </flux:card>

        </div>


        {{-- Submission --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            <flux:card class="lg:col-span-2 dark:!bg-zinc-950 dark:border-zinc-800">

                <flux:heading size="lg">
                    Submission
                </flux:heading>

                <div class="mt-5">

                    @if($submission->file_path)

                        <div class="flex items-center justify-between rounded-xl border border-zinc-200 p-4 dark:border-zinc-800">

                            <div class="flex items-center gap-3">

                                <div class="flex size-11 items-center justify-center rounded-xl bg-zinc-100 dark:bg-zinc-900">

                                    <flux:icon
                                        name="paper-clip"
                                        class="size-5 text-zinc-500"
                                    />

                                </div>

                                <div>

                                    <flux:text class="font-medium">
                                        Submitted file
                                    </flux:text>

                                    <flux:text class="text-sm text-zinc-500">
                                        Uploaded {{ $submission->created_at->format('M d, Y H:i') }}
                                    </flux:text>

                                </div>

                            </div>

                            <flux:button
                                href="{{ route(
                                    'teacher.homeworks.submissions.preview',
                                    $submission
                                ) }}"
                                target="_blank"
                                variant="primary"
                                icon="eye"
                            >
                                Preview
                            </flux:button>

                        </div>

                    @else

                        <flux:text class="text-zinc-500">
                            No file submitted.
                        </flux:text>

                    @endif

                </div>

            </flux:card>


            {{-- Feedback --}}
            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <flux:heading size="lg">
                    Feedback
                </flux:heading>

                @if($submission->feedback)

                    <div class="mt-5 whitespace-pre-line text-zinc-700 dark:text-zinc-300">
                        {{ $submission->feedback }}
                    </div>

                @else

                    <flux:text class="mt-5 text-zinc-500">
                        No feedback provided.
                    </flux:text>

                @endif

            </flux:card>

        </div>

    </div>

</x-layouts::app>
