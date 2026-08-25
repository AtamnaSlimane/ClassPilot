<x-layouts::app :title="__('Grade Submission')">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="space-y-2">

            <flux:button
                href="{{ route(
                    'teacher.homeworks.submissions.show',
                    [$homework, $submission]
                ) }}"
                variant="ghost"
                size="sm"
                icon="arrow-left"
                inset
            >
                Submission
            </flux:button>

            <flux:heading size="xl">
                Grade Submission
            </flux:heading>

            <flux:text class="text-zinc-500">
                Grade {{ $submission->student->name }}'s submission for
                {{ $homework->title }}.
            </flux:text>

        </div>


        <div class="max-w-2xl">

            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                <form
                    method="POST"
                    action="{{ route(
                        'teacher.homeworks.submissions.update',
                        [$homework, $submission]
                    ) }}"
                    class="space-y-6"
                >

                    @csrf
                    @method('PUT')


                    {{-- Grade --}}
                    <flux:field>

                        <flux:label>
                            Grade
                        </flux:label>

                        <flux:input
                            type="number"
                            name="grade"
                            min="0"
                            max="20"
                            step="0.25"
                            value="{{ old('grade', $submission->grade) }}"
                            placeholder="0 - 20"
                        />

                        <flux:description>
                            Enter a grade between 0 and 20.
                        </flux:description>

                        @error('grade')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror

                    </flux:field>


                    {{-- Feedback --}}
                    <flux:field>

                        <flux:label>
                            Feedback
                        </flux:label>

                        <flux:textarea
                            name="feedback"
                            rows="7"
                            placeholder="Write feedback for the student..."
                        >{{ old('feedback', $submission->feedback) }}</flux:textarea>

                        @error('feedback')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror

                    </flux:field>


                    {{-- Actions --}}
                    <div class="flex justify-end gap-3 border-t border-zinc-200 pt-5 dark:border-zinc-800">

                        <flux:button
                            href="{{ route(
                                'teacher.homeworks.submissions.show',
                                [$homework, $submission]
                            ) }}"
                            variant="ghost"
                        >
                            Cancel
                        </flux:button>

                        <flux:button
                            type="submit"
                            variant="primary"
                            icon="check"
                        >
                            Save Grade
                        </flux:button>

                    </div>

                </form>

            </flux:card>

        </div>

    </div>

</x-layouts::app>
