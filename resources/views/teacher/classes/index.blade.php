<x-layouts::app :title="__('Classes')">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-1">

                <flux:heading size="xl">
                    Classes
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Manage your classes and students.
                </flux:text>

            </div>

        </div>


        {{-- Classes --}}
        <flux:card class="overflow-hidden p-0 dark:!bg-zinc-950 dark:border-zinc-800">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead
                        class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-900"
                    >

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Class
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Students
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                                Capacity
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

                        @forelse($classes as $class)

                            <tr class="transition-colors hover:bg-zinc-50 dark:hover:bg-zinc-900">

                                {{-- Name --}}
                                <td class="px-6 py-4">

                                    <a
                                        href="{{ route('teacher.classes.show', $class) }}"
                                        class="font-medium text-zinc-900 hover:text-blue-600 hover:underline dark:text-zinc-100 dark:hover:text-blue-400"
                                    >
                                        {{ $class->name }}
                                    </a>

                                    @if($class->description)

                                        <flux:text class="mt-1 max-w-md truncate text-xs text-zinc-500">
                                            {{ $class->description }}
                                        </flux:text>

                                    @endif

                                </td>


                                {{-- Students --}}
                                <td class="px-6 py-4">

                                    <flux:text>
                                        {{ $class->students_count }}
                                    </flux:text>

                                </td>


                                {{-- Capacity --}}
                                <td class="px-6 py-4">

                                    <flux:text>
                                        {{ $class->capacity }}
                                    </flux:text>

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($class->isFull())

                                        <flux:badge
                                            color="red"
                                            icon="x-circle"
                                        >
                                            Full
                                        </flux:badge>

                                    @else

                                        <flux:badge
                                            color="emerald"
                                            icon="check-circle"
                                        >
                                            Available
                                        </flux:badge>

                                    @endif

                                </td>


                                {{-- Action --}}
                                <td class="px-6 py-4 text-right">

                                    <flux:button
                                        href="{{ route('teacher.classes.show', $class) }}"
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

                                        <div class="mb-3 flex size-12 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-900">

                                            <flux:icon
                                                name="academic-cap"
                                                class="size-6 text-zinc-400"
                                            />

                                        </div>

                                        <flux:heading size="sm">
                                            No classes yet
                                        </flux:heading>

                                        <flux:text class="mt-1 text-zinc-500">
                                            Create your first class to get started.
                                        </flux:text>

                                        <flux:button
                                            href="{{ route('teacher.classes.create') }}"
                                            variant="ghost"
                                            class="mt-4"
                                            icon="plus"
                                        >
                                            Add Class
                                        </flux:button>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </flux:card>

    </div>

</x-layouts::app>
