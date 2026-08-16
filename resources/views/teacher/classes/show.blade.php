<x-layouts::app :title="$class->name">

    <div class="space-y-8">

        {{-- Page Header --}}
        <div class="flex items-start justify-between">

            <div>
                <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                    {{ $class->name }}
                </h1>

                <p class="mt-2 max-w-2xl text-lg text-zinc-500">
                    {{ $class->description }}
                </p>
            </div>


            {{-- Actions --}}
            <div class="flex gap-3">

                <a
                    href="{{ route('teacher.classes.edit', $class) }}"
                    class="rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white
                           shadow-sm transition hover:bg-blue-700 hover:shadow-md">

                    Edit

                </a>


                <form
                    method="POST"
                    action="{{ route('teacher.classes.destroy', $class) }}"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        onclick="return confirm('Delete this class?')"
                        class="rounded-xl bg-red-600 px-5 py-3 font-semibold text-white
                               shadow-sm transition hover:bg-red-700 hover:shadow-md">

                        Delete

                    </button>

                </form>

            </div>

        </div>


        {{-- Class Information --}}
        <div class="grid gap-4 md:grid-cols-3">

            {{-- Class Code --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm
                        dark:border-zinc-700 dark:bg-zinc-900">

                <p class="text-sm font-medium text-zinc-500">
                    Class Code
                </p>

                <p class="mt-2 text-2xl font-bold text-zinc-900 dark:text-white">
                    {{ $class->code }}
                </p>

            </div>


            {{-- Students --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm
                        dark:border-zinc-700 dark:bg-zinc-900">

                <p class="text-sm font-medium text-zinc-500">
                    Students
                </p>

                <p class="mt-2 text-2xl font-bold text-zinc-900 dark:text-white">
                    {{ $class->students->count() }}
                </p>

            </div>


            {{-- Capacity --}}
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm
                        dark:border-zinc-700 dark:bg-zinc-900">

                <p class="text-sm font-medium text-zinc-500">
                    Capacity
                </p>

                <p class="mt-2 text-2xl font-bold text-zinc-900 dark:text-white">
                    {{ $class->capacity }}
                </p>

            </div>

        </div>


        {{-- Students --}}
        <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm
                    dark:border-zinc-700 dark:bg-zinc-900">

            {{-- Card Header --}}
            <div class="border-b border-zinc-100 px-8 py-6 dark:border-zinc-700">

                <h2 class="text-xl font-bold text-zinc-900 dark:text-white">
                    Students
                </h2>

                <p class="mt-1 text-sm text-zinc-500">
                    Students currently assigned to this class.
                </p>

            </div>


            {{-- Student List --}}
            <div>

                @forelse($class->students as $student)

                    <div class="flex items-center justify-between border-b border-zinc-100
                                px-8 py-5 transition hover:bg-zinc-50
                                last:border-none dark:border-zinc-700 dark:hover:bg-zinc-800">

                        <div>

                            <p class="font-semibold text-zinc-900 dark:text-white">
                                {{ $student->name }}
                            </p>

                            <p class="mt-1 text-sm text-zinc-500">
                                {{ $student->email }}
                            </p>

                        </div>


                        <a
                            href="{{ route('teacher.students.show', $student) }}"
                            class="text-sm font-semibold text-blue-600 hover:text-blue-700
                                   hover:underline dark:text-blue-400">

                            View Student

                        </a>

                    </div>

                @empty

                    <div class="px-8 py-12 text-center">

                        <p class="text-zinc-500">
                            No students assigned.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-layouts::app>