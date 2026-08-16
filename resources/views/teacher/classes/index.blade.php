<x-layouts::app :title="__('My Classes')">

<div class="space-y-8">

    {{-- Page Header --}}
    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                My Classes
            </h1>

            <p class="mt-2 text-lg text-zinc-500">
                Manage classes assigned to you.
            </p>
        </div>


        <a href="{{ route('teacher.classes.create') }}"
           class="rounded-xl bg-green-600 px-6 py-3 text-lg font-semibold shadow-sm transition  text-white hover:bg-green-700 hover:shadow-md ">

            + Add Class

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Classes Table --}}
    <div class="overflow-hidden rounded-2xl border border-zinc-200  bg-white shadow-sm 
                dark:border-zinc-700 dark:bg-zinc-900 ">

        <table class="min-w-full">

            {{-- Table Header --}}
            <thead class="bg-zinc-50 dark:bg-zinc-800">

                <tr>

                    <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        Name
                    </th>


                    <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        Code
                    </th>


                    <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        Students
                    </th>


                    <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        Capacity
                    </th>


                    <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        Status
                    </th>

                </tr>

            </thead>


            {{-- Table Body --}}
            <tbody>


            @forelse($classes as $class)


                <tr class="border-t border-zinc-100 transition hover:bg-zinc-50 
                            dark:border-zinc-700 dark:hover:bg-zinc-800">

                    {{-- Name --}}
                    <td class="px-8 py-6 ">

                        <a
                            href="{{ route('teacher.classes.show', $class) }}"
                            class="font-semibold text-blue-600 hover:text-blue-700 hover:underline 
                                    dark:text-blue-400">

                            {{ $class->name }}

                        </a>

                    </td>


                    {{-- Code --}}
                    <td class="px-8 py-6 text-zinc-700 dark:text-zinc-300">

                        {{ $class->code }}

                    </td>


                    {{-- Students --}}
                    <td class="px-8 py-6 text-zinc-700 dark:text-zinc-300">

                        {{ $class->students()->count() }}

                    </td>


                    {{-- Capacity --}}
                    <td class="px-8 py-6 text-zinc-700 dark:text-zinc-300">

                        {{ $class->capacity }}

                    </td>


                    {{-- Status --}}
                    <td class="px-8 py-6">

                        <span class="inline-flex rounded-full px-4 py-2 text-sm
                            {{ $class->students()->count() < $class->capacity
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' }}">

                            {{ $class->students()->count() < $class->capacity
                                ? 'Available'
                                : 'Full' }}

                        </span>

                    </td>


                </tr>


            @empty


                <tr>

                    <td colspan="5"
                        class="px-8 py-12 text-center text-zinc-500">

                        No classes found.

                    </td>

                </tr>


            @endforelse


            </tbody>


        </table>


    </div>


</div>

</x-layouts::app>
