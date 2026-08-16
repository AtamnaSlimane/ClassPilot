<x-layouts::app :title="__('Create Class')">

    <div class="space-y-8">

        {{-- Page Header --}}
        <div>
            <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                Create Class
            </h1>

            <p class="mt-2 text-lg text-zinc-500">
                Create a new class and assign students to it.
            </p>
        </div>


        {{-- Form Card --}}
        <form
            method="POST"
            action="{{ route('teacher.classes.store') }}"
            class="max-w-3xl rounded-2xl border border-zinc-200 bg-white p-8 shadow-sm
                   dark:border-zinc-700 dark:bg-zinc-900"
        >

            @csrf


            {{-- Form Fields --}}
            <div class="space-y-6">

                @include('teacher.classes._form')

            </div>


            {{-- Actions --}}
            <div class="mt-8 flex items-center justify-end gap-3 border-t border-zinc-100 pt-6
                        dark:border-zinc-700">

                <a
                    href="{{ route('teacher.classes.index') }}"
                    class="rounded-xl px-5 py-3 font-semibold text-zinc-600
                           transition hover:bg-zinc-100
                           dark:text-zinc-300 dark:hover:bg-zinc-800"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-green-600 px-6 py-3 font-semibold text-white
                           shadow-sm transition hover:bg-green-700 hover:shadow-md"
                >
                    Create Class
                </button>

            </div>

        </form>

    </div>

</x-layouts::app>