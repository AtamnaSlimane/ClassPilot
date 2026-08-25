<x-layouts::app :title="__('Edit Homework')">

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
                    Edit Homework
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Update "{{ $homework->title }}".
                </flux:text>

            </div>

            <flux:button
                href="{{ route('teacher.homeworks.show', $homework) }}"
                variant="ghost"
                icon="eye"
            >
                View Homework
            </flux:button>

        </div>


        <div class="max-w-3xl">

            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                @include('teacher.homeworks._form', [
                    'action' => route('teacher.homeworks.update', $homework),
                    'method' => 'PUT',
                    'submitLabel' => 'Save Changes',
                    'cancelUrl' => route('teacher.homeworks.show', $homework),
                    'homework' => $homework,
                ])

            </flux:card>


            {{-- Delete --}}
            <flux:card class="mt-6 border-red-200 dark:border-red-900/50 dark:!bg-zinc-950">

                <flux:heading size="lg">
                    Delete Homework
                </flux:heading>

                <flux:text class="mt-1 text-zinc-500">
                    Permanently delete this homework assignment.
                </flux:text>

                <div class="mt-5">

                    <flux:modal.trigger name="delete-homework-{{ $homework->id }}">

                        <flux:button
                            variant="danger"
                            icon="trash"
                        >
                            Delete Homework
                        </flux:button>

                    </flux:modal.trigger>

                </div>

            </flux:card>

        </div>

    </div>


    <x-confirm-delete
        name="{{ $homework->title }}"
        action="{{ route('teacher.homeworks.destroy', $homework) }}"
        modal="delete-homework-{{ $homework->id }}"
    />

</x-layouts::app>
