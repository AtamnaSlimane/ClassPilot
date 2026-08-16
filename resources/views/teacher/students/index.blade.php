<x-layouts::app :title="__('My Students')">

    <div class="space-y-8">


        <div class="flex items-center justify-between">

            <div>
                <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                    My Students
                </h1>

                <p class="mt-2 text-lg text-zinc-500">
                    Manage students assigned to you.
                </p>
            </div>


            <a href="{{ route('teacher.students.create') }}"
                class="rounded-xl bg-blue-600 px-6 py-3 text-lg font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md ">

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
            class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:bg-zinc-700 dark:border-zinc-900">

            <table class="min-w-full">


                <thead class="bg-zinc-50 dark:bg-zinc-800">

                    <tr>

                        <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                            Name
                        </th>


                        <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                            Email
                        </th>


                        <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                            Parent
                        </th>


                        <th class="px-8 py-5 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                            Status
                        </th>

                    </tr>


                    

                </thead>


                {{-- table body --}}
                <tbody>


                    @forelse($students as $student)


                                    <tr class="border-t border-zinc-100 transition hover:bg-zinc-50 dark:border-zinc-700 dark:hover:bg-zinc-800">

                                        {{-- Name --}}
                                        <td class="px-8 py-6 ">
                                            <a href="{{ route('teacher.students.show', $student) }}"
                                                class="font-semibold text-blue-600 hover:text-blue-700 hover:underline dark:text-blue-400">
                                                {{ $student->name }}
                                            </a>
                                        </td>



                                        {{--email--}}
                                        <td class="px-8 py-6 text-zinc-700 dark:text-zinc-300">

                                            {{ $student->email }}

                                        </td>


                                        {{--parent--}}
                                        
                                        <td class="px-8 py-6 text-zinc-700 dark:text-zinc-300">

                                            {{ $student->parent?->name ?? 'No parent' }}

                                        </td>


                                        {{--status--}}

                                        <td class="px-8 py-6">

                                            <span class="rounded-full inline-flex px-4 py-2 text-sm font-medium 
                                                        {{ $student->status === 'active'
                                                  ? 'bg-green-100 text-green-700'
                                                  : 'bg-red-100 text-red-700' }}">

                                                {{ ucfirst($student->status) }}

                                            </span>

                                        </td>


                                    </tr>


                    @empty


                        <tr>

                            <td colspan="4" class="px-8 py-12 text-center text-zinc-500">

                                No students found.

                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>

</x-layouts::app>