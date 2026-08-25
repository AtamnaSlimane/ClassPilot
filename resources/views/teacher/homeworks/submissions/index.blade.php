<x-layouts::app :title="__('Submissions')">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-2">

                <flux:button
                    href="{{ route('teacher.homeworks.show', $homework) }}"
                    variant="ghost"
                    size="sm"
                    icon="arrow-left"
                    inset
                >
                    {{ $homework->title }}
                </flux:button>

                <flux:heading size="xl">
                    Submissions
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Review student submissions for this homework.
                </flux:text>

            </div>

            <flux:badge color="zinc">
                {{ $submissions->count() }} submissions
            </flux:badge>

        </div>


        <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

            @if($submissions->count())

                <div class="divide-y divide-zinc-200 dark:divide-zinc-800">

                    @foreach($submissions as $submission)

                        <div class="flex items-center justify-between gap-4 px-6 py-5 hover:bg-zinc-50 dark:hover:bg-zinc-900">

                            <div class="flex min-w-0 items-center gap-4">

                                <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-zinc-100 text-sm font-semibold text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300">

                                    {{ collect(explode(' ', $submission->student->name))
                                        ->map(fn ($part) => $part[0] ?? '')
                                        ->take(2)
                                        ->implode('') }}

                                </div>

                                <div class="min-w-0">

                                    <flux:text class="font-medium">
                                        {{ $submission->student->name }}
                                    </flux:text>

                                    <flux:text class="text-sm text-zinc-500">
                                        Submitted {{ $submission->created_at->format('M d, Y H:i') }}
                                    </flux:text>

                                </div>

                            </div>


                            <div class="flex items-center gap-3">

                                @if($submission->grade !== null)

                                    <flux:badge color="emerald">
                                        {{ $submission->grade }}/20
                                    </flux:badge>

                                @else

                                    <flux:badge color="amber">
                                        Not graded
                                    </flux:badge>

                                @endif

                                <flux:button
                                    href="{{ route(
                                        'teacher.homeworks.submissions.show',
                                        [$homework, $submission]
                                    ) }}"
                                    variant="ghost"
                                    size="sm"
                                    icon="chevron-right"
                                    inset
                                />

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="flex flex-col items-center justify-center px-6 py-16 text-center">

                    <div class="mb-3 flex size-12 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-900">

                        <flux:icon
                            name="inbox"
                            class="size-6 text-zinc-400"
                        />

                    </div>

                    <flux:heading size="sm">
                        No submissions
                    </flux:heading>

                    <flux:text class="mt-1 text-zinc-500">
                        Students have not submitted this homework yet.
                    </flux:text>

                </div>

            @endif

        </flux:card>

    </div>

</x-layouts::app>
