<x-layouts::app :title="$student->name">

    <div class="space-y-8">

        {{-- Page Header --}}
        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                    {{ $student->name }}
                </h1>

                <p class="mt-2 text-lg text-zinc-500">
                    Student Profile
                </p>

            </div>


            <div class="flex gap-3">

                <a href="{{ route('teacher.students.edit', $student) }}" class="rounded-xl bg-blue-600 px-6 py-3 text-lg font-semibold text-white
                           shadow-sm transition hover:bg-blue-700 hover:shadow-md">

                    Edit

                </a>

                <a href="{{ route('teacher.students.index') }}" class="rounded-xl bg-zinc-700 px-6 py-3 text-lg font-semibold text-white
                           shadow-sm transition hover:bg-zinc-800 hover:shadow-md">

                    Back

                </a>

            </div>

        </div>


        {{-- Student Information --}}
        <div class="grid gap-5 md:grid-cols-3">

            {{-- Information Card --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-7 shadow-sm
               dark:border-zinc-700 dark:bg-zinc-900">

                <h2 class="mb-6 text-xl font-bold text-zinc-900 dark:text-white">
                    Information
                </h2>

                <dl class="space-y-5">

                    <div>
                        <dt class="text-sm font-medium text-zinc-500">
                            Email
                        </dt>

                        <dd class="mt-1 text-zinc-900 dark:text-zinc-100">
                            {{ $student->email }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-zinc-500">
                            Phone
                        </dt>

                        <dd class="mt-1 text-zinc-900 dark:text-zinc-100">
                            {{ $student->phone ?? 'Not provided' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-zinc-500">
                            Status
                        </dt>

                        <dd class="mt-1 text-zinc-900 dark:text-zinc-100">
                            {{ ucfirst($student->status) }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-zinc-500">
                            Join Date
                        </dt>

                        <dd class="mt-1 text-zinc-900 dark:text-zinc-100">
                            {{ optional($student->join_date)->format('M d, Y') ?? '-' }}
                        </dd>
                    </div>

                </dl>

            </div>


            {{-- Right Side --}}
            <div class="md:col-span-2 space-y-5">

                {{-- Parent + Teachers --}}
                <div class="grid gap-5 md:grid-cols-2">

                    {{-- Parent Card --}}
                    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm
                       dark:border-zinc-700 dark:bg-zinc-900">

                        <h2 class="mb-4 text-lg font-bold text-zinc-900 dark:text-white">
                            Parent
                        </h2>

                        @if($student->parent)

                            <p class="text-zinc-900 dark:text-zinc-100">
                                {{ $student->parent->name }}
                            </p>

                        @else

                            <span class="text-zinc-500">
                                No parent assigned
                            </span>

                        @endif

                    </div>


                    {{-- Teachers Card --}}
                    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm
                       dark:border-zinc-700 dark:bg-zinc-900">

                        <h2 class="mb-4 text-lg font-bold text-zinc-900 dark:text-white">
                            Teachers
                        </h2>

                        @forelse($student->teachers as $teacher)

                            <div class="mb-2 rounded-lg bg-zinc-50 px-3 py-2
                                    dark:bg-zinc-800">

                                {{ $teacher->name }}

                            </div>

                        @empty

                            <p class="text-zinc-500">
                                No teachers assigned.
                            </p>

                        @endforelse

                    </div>

                </div>


                {{-- Notes --}}
                <div class="rounded-2xl border border-zinc-200 bg-white p-7 shadow-sm
                   dark:border-zinc-700 dark:bg-zinc-900">

                    <h2 class="mb-5 text-xl font-bold text-zinc-900 dark:text-white">
                        Notes
                    </h2>

                    <p class="leading-relaxed text-zinc-700 dark:text-zinc-300">
                        {{ $student->notes ?: 'No notes available.' }}
                    </p>

                </div>

            </div>

        </div>
    </div>

</x-layouts::app>