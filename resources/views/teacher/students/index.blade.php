<x-layouts::app :title="__('Students')">

    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div class="space-y-1">

                <flux:heading size="xl">
                    Students
                </flux:heading>

                <flux:text class="text-zinc-500">
                    Students assigned to you.
                </flux:text>

            </div>

        </div>


        {{-- Search + Table --}}
        <livewire:teacher.students.search />

    </div>

</x-layouts::app>
