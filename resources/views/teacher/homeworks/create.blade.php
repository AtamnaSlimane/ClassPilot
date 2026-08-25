<x-layouts::app :title="__('Create Homework')">

    <div class="space-y-8">

        {{-- Header --}}
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
                Create Homework
            </flux:heading>

            <flux:text class="text-zinc-500">
                Create a new assignment for one of your classes.
            </flux:text>

        </div>


        <div class="max-w-3xl">

            <flux:card class="dark:!bg-zinc-950 dark:border-zinc-800">

                @include('teacher.homeworks._form', [
                    'action' => route('teacher.homeworks.store'),
                    'method' => 'POST',
                    'submitLabel' => 'Create Homework',
                    'cancelUrl' => route('teacher.homeworks.index'),
                    'homework' => null,
                ])

            </flux:card>

        </div>

    </div>

</x-layouts::app>
