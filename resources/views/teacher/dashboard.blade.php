<x-layouts::app :title="__('Teacher Dashboard')">
    <div class=" flex flex-col -mb-6 -mt-6 m-0  ">

        <div class="flex flex-row justify-between items-end  h-75 mb-3 ">
            <div class="  flex w-1/2 flex-col justify-end h-50 p-2 ">
                <h1 class="text-5xl text-zinc-900 font-bold ">
                    Teacher Dashboard
                </h1>

                <p class="mt-3 text-lg text-zinc-500 ml-3 mb-8">
                    Manage your students from here.
                </p>
            </div>
            {{-- bg-[url('https://i.pinimg.com/736x/d2/c9/b7/d2c9b7a1ea6d1306b217b0f3016ad265.jpg')] --}}

            <div
                class="rounded-xl border  shadow-lg w-1/2 h-full p-6 bg-linear-to-br from-blue-600 to-sky-500 font-bold flex flex-col justify-center items-center">

                <h2 class="text-xl text-white font-bold text-center">
                    Students
                </h2>

                <p class="mt-2 text-white text-center">
                    View and manage your students.
                </p>

                <div class="mt-8 flex gap-4 ">

                    <a href="{{ route('teacher.students.index') }}"
           class="rounded-lg bg-white px-5 py-2.5 font-medium text-blue-600 transition-all duration-300 hover:scale-105 hover:bg-zinc-100">
            View Students
        </a>

                    <a href="{{ route('teacher.students.create') }}"
                        class="rounded-lg border border-white bg-white/20 px-5 py-2.5 font-medium text-white backdrop-blur transition-all duration-300 hover:bg-blue-900 ">
                        Add Student
                    </a>

                </div>
            </div>

        </div>

        <div class="grid h-32 gap-3 md:grid-cols-4 p-2 mb-0 mt-0 m-0 ">

            <a href="#"
                class="rounded-xl border border-zinc-200 bg-white p-3 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                        <flux:icon.academic-cap class="h-5 w-5 text-blue-600" />
                    </div>

                    <h3 class="text-lg font-semibold text-zinc-900">
                        Classes
                    </h3>
                </div>

                <p class="mt-4 text-sm text-zinc-500">
                    View and manage all your classes.
                </p>

            </a>

            <a href="#"
                class="rounded-xl border border-zinc-200 bg-white p-3 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-sky-100">
                        <flux:icon.book-open class="h-5 w-5 text-sky-600" />
                    </div>

                    <h3 class="text-lg font-semibold text-zinc-900">
                        Subjects
                    </h3>
                </div>

                <p class="mt-4 text-sm text-zinc-500">
                    Organize and update your subjects.
                </p>

            </a>

            <a href="#"
                class="rounded-xl border border-zinc-200 bg-white p-3 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-100">
                        <flux:icon.clipboard-document-check class="h-5 w-5 text-indigo-600" />
                    </div>

                    <h3 class="text-lg font-semibold text-zinc-900">
                        Attendance
                    </h3>
                </div>

                <p class="mt-4 text-sm text-zinc-500">
                    Track and manage student attendance.
                </p>

            </a>

            {{-- <a href="#"
                class="rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-violet-100">
                    <flux:icon.chart-bar class="h-6 w-6 text-violet-600" />
                </div>

                <h3 class="text-lg font-semibold text-zinc-900">
                    Reports
                </h3>

                <p class="mt-2 text-sm text-zinc-500">
                    Generate and view reports.
                </p>

            </a> --}}
            <a href="#"
                class="rounded-xl border border-zinc-200 bg-white p-3 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-violet-100">
                        <flux:icon.chart-bar class="h-5 w-5 text-violet-600" />
                    </div>

                    <h3 class="text-lg font-semibold text-zinc-900">
                        Reports
                    </h3>
                </div>

                <p class="mt-4 text-sm text-zinc-500">
                    Generate and review student reports.
                </p>

            </a>
            </p>
            </a>

        </div>

    </div>

</x-layouts::app>