<x-layouts::app :title="__('My Students')">

    <div class="space-y-6 p-3 sm:space-y-8 sm:p-0">

        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-3xl font-bold text-zinc-900 dark:text-white sm:text-4xl">
                    My Students
                </h1>

                <p class="mt-2 text-base text-zinc-500 sm:text-lg">
                    Manage students assigned to you.
                </p>
            </div>

            <a
                href="{{ route('teacher.students.create') }}"
                class="w-full rounded-xl bg-blue-600 px-6 py-3 text-center text-base font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md sm:w-auto sm:text-lg">

                + Add Student

            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
                {{ session('success') }}
            </div>

        @endif


        {{-- Student Table --}}
        <div
            class="overflow-x-auto rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-900 dark:bg-zinc-700">

            <table class="min-w-[700px] w-full">

                {{-- Table Header --}}
                <thead class="bg-zinc-50 dark:bg-zinc-800">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200 sm:px-8 sm:py-5">
                            Name
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200 sm:px-8 sm:py-5">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200 sm:px-8 sm:py-5">
                            Parent
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200 sm:px-8 sm:py-5">
                            Status
                        </th>

                    </tr>

                </thead>


                {{-- Table Body --}}
                <tbody>

                    @forelse($students as $student)

                        <tr
                            class="border-t border-zinc-100 transition hover:bg-zinc-50 dark:border-zinc-700 dark:hover:bg-zinc-800">

                            {{-- Name --}}
                            <td class="px-6 py-5 sm:px-8 sm:py-6">

                                <a
                                    href="{{ route('teacher.students.show', $student) }}"
                                    class="font-semibold text-blue-600 hover:text-blue-700 hover:underline dark:text-blue-400">

                                    {{ $student->name }}

                                </a>

                            </td>


                            {{-- Email --}}
                            <td class="px-6 py-5 text-zinc-700 dark:text-zinc-300 sm:px-8 sm:py-6">

                                {{ $student->email }}

                            </td>


                            {{-- Parent --}}
                            <td class="px-6 py-5 text-zinc-700 dark:text-zinc-300 sm:px-8 sm:py-6">

                                {{ $student->parent?->name ?? 'No parent' }}

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-5 sm:px-8 sm:py-6">

                                <span
                                    class="inline-flex rounded-full px-4 py-2 text-sm font-medium
                                    {{ $student->status === 'active'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700' }}">

                                    {{ ucfirst($student->status) }}

                                </span>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="px-8 py-12 text-center text-zinc-500">

                                No students found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-layouts::app>