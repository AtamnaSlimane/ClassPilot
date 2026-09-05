<x-layouts::app :title="__('Teacher Dashboard')">

    <div class="m-0">

       {{-- ================= HERO ================= --}}
<section class="relative min-h-[calc(100vh-2rem)] overflow-hidden bg-[#607050]">

    {{-- LEFT SIDE --}}
    <div
        class="relative z-20 flex min-h-[calc(100vh-5rem)] w-full items-center
               px-8 lg:w-1/2 lg:px-16">

        <div class="max-w-xl">

            <h1
                class="font-['Nunito'] text-5xl font-bold leading-tight tracking-tight
                       text-[#F3E9D2] lg:text-6xl">

                Teacher Dashboard

            </h1>

            <p
                class="ml-1 mt-4 text-lg font-medium tracking-wide
                       text-[#D8D9C9] lg:text-xl">

                Manage your students from here.

            </p>

        </div>

    </div>


    {{-- RIGHT SIDE IMAGE --}}
    <div class="absolute inset-y-0 top-0 right-0 hidden w-[62%] lg:block">

        <img
            src="{{ asset('images/teacher-class.jpg') }}"
            alt="Teacher in classroom"
            class="h-full w-full object-cover object-center"
        >


        {{-- LEFT FADE --}}
        <div
            class="absolute inset-y-0 left-0 w-[38%]
                   bg-linear-to-r
                   from-[#607050]
                   via-[#607050]/70
                   to-transparent">
        </div>


        {{-- VERY SOFT TOP FADE --}}
        <div
            class="absolute inset-x-0 top-0 h-8
                   bg-linear-to-b
                   from-[#607050]/40
                   to-transparent">
        </div>


        {{-- VERY SOFT RIGHT FADE --}}
        <div
            class="absolute inset-y-0 right-0 w-6
                   bg-linear-to-l
                   from-[#607050]/30
                   to-transparent">
        </div>


        {{-- BOTTOM FADE --}}
        <div
            class="absolute inset-x-0 bottom-0 h-24
                   bg-linear-to-t
                   from-[#607050]/70
                   to-transparent">
        </div>

    </div>

</section>


        {{-- ================= STUDENTS HERO CARD ================= --}}
        <section class="px-6 py-12 lg:px-16">

            <div
                class="mx-auto flex min-h-80 max-w-6xl flex-col items-center
                       justify-center rounded-3xl
                       bg-[#FAF9F5]
                       px-6 py-12 text-center shadow-xl">

                <h2 class="text-3xl font-bold text-[#2C3528]">
                    Students
                </h2>

                <p class="mt-3 text-lg text-[#2C3528]/90">
                    View and manage your students.
                </p>


                <div class="mt-8 flex flex-col gap-4 sm:flex-row">

                    <a
                        href="{{ route('teacher.students.index') }}"
                        class="rounded-xl bg-white px-6 py-3
                               font-semibold text-[#E8A87C]
                               shadow-sm transition-all duration-300
                               hover:scale-105 hover:bg-zinc-100">

                        View Students

                    </a>


                    <a
                        href="{{ route('teacher.students.create') }}"
                        class="rounded-xl border border-[#2C3528]/70
                               bg-[#E8A87C] px-6 py-3
                               font-semibold text-white
                               backdrop-blur-sm
                               transition-all duration-300
                               hover:scale-105 hover:bg-[#E8A87C]/80">

                        Add Student

                    </a>

                </div>

            </div>

        </section>


        {{-- ================= DASHBOARD CARDS ================= --}}
        <section class="px-6 pb-16 lg:px-16">

            <div class="mx-auto grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-4">


                {{-- Classes --}}
                <a
                    href="#"
                    class="rounded-2xl border border-[#A3B19B] bg-[#2C3528]/60 p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100">
                            <flux:icon.academic-cap class="h-5 w-5 text-blue-600" />
                        </div>

                        <h3 class="text-lg font-semibold text-[#FAF9F5]">
                            Classes
                        </h3>

                    </div>

                    <p class="mt-4 text-sm text-[#FAF9F5]/90">
                        View and manage all your classes.
                    </p>

                </a>


                {{-- Subjects --}}
                <a
                    href="#"
                    class="rounded-2xl border border-[#A3B19B] bg-[#2C3528]/60 p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-100">
                            <flux:icon.book-open class="h-5 w-5 text-sky-600" />
                        </div>

                        <h3 class="text-lg font-semibold text-[#FAF9F5]">
                            Subjects
                        </h3>

                    </div>

                    <p class="mt-4 text-sm text-[#FAF9F5]/90">
                        Organize and update your subjects.
                    </p>

                </a>


                {{-- Attendance --}}
                <a
                    href="#"
                    class="rounded-2xl border border-[#A3B19B] bg-[#2C3528]/60 p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100">
                            <flux:icon.clipboard-document-check class="h-5 w-5 text-indigo-600" />
                        </div>

                        <h3 class="text-lg font-semibold text-[#FAF9F5]">
                            Attendance
                        </h3>

                    </div>

                    <p class="mt-4 text-sm text-[#FAF9F5]/90">
                        Track and manage student attendance.
                    </p>

                </a>


                {{-- Reports --}}
                <a
                    href="#"
                    class="rounded-2xl border border-[#A3B19B] bg-[#2C3528]/60 p-5
                           shadow-sm transition-all duration-300
                           hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100">
                            <flux:icon.chart-bar class="h-5 w-5 text-violet-600" />
                        </div>

                        <h3 class="text-lg font-semibold text-[#FAF9F5]">
                            Reports
                        </h3>

                    </div>

                    <p class="mt-4 text-sm text-[#FAF9F5]/90">
                        Generate and review student reports.
                    </p>

                </a>

            </div>

        </section>

    </div>

</x-layouts::app>