<x-layouts::app :title="__('Teacher Dashboard')">

    <div class="m-0 flex flex-col">

        {{-- Hero Section --}}
        <div class="flex flex-col gap-6 p-3 md:flex-row md:items-end md:justify-between md:h-75 md:mb-3">

            {{-- Title --}}
            <div class="flex w-full flex-col justify-end p-2 md:w-1/2 md:h-50">

                <h1 class="text-3xl font-bold text-zinc-900 sm:text-4xl md:text-5xl">
                    Teacher Dashboard
                </h1>

                <p class="mt-3 ml-1 text-base text-zinc-500 sm:text-lg md:ml-3 md:mb-8">
                    Manage your students from here.
                </p>

            </div>


            {{-- Students Card --}}
            <div
                class="flex min-h-64 w-full flex-col items-center justify-center rounded-xl border bg-linear-to-br from-blue-600 to-sky-500 p-6 font-bold shadow-lg md:h-full md:w-1/2">

                <h2 class="text-xl font-bold text-center text-white">
                    Students
                </h2>

                <p class="mt-2 text-center text-white">
                    View and manage your students.
                </p>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4">

                    <a
                        href="{{ route('teacher.students.index') }}"
                        class="rounded-lg bg-white px-5 py-2.5 text-center font-medium text-blue-600 transition-all duration-300 hover:scale-105 hover:bg-zinc-100">

                        View Students

                    </a>

                    <a
                        href="{{ route('teacher.students.create') }}"
                        class="rounded-lg border border-white bg-white/20 px-5 py-2.5 text-center font-medium text-white backdrop-blur transition-all duration-300 hover:bg-blue-900">

                        Add Student

                    </a>

                </div>

            </div>

        </div>


        {{-- Feature Cards --}}
        <div class="grid grid-cols-1 gap-3 p-3 sm:grid-cols-2 md:grid-cols-4">

            {{-- Classes --}}
            <a
                href="#"
                class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-100">
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


            {{-- Subjects --}}
            <a
                href="#"
                class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-sky-100">
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


            {{-- Attendance --}}
            <a
                href="#"
                class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-indigo-100">
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


            {{-- Reports --}}
            <a
                href="#"
                class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-violet-100">
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

        </div>

    </div>

</x-layouts::app>