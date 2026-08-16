<x-layouts::app :title="__('Edit Class')">

    <div class="space-y-8">

        {{-- Page Header --}}
        <div>
            <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                Edit Class
            </h1>

            <p class="mt-2 text-lg text-zinc-500">
                Update the information for {{ $class->name }}.
            </p>
        </div>


        {{-- Edit Form --}}
        <form
            method="POST"
            action="{{ route('teacher.classes.update', $class) }}"
            class="max-w-3xl rounded-2xl border border-zinc-200 bg-white p-8 shadow-sm
                   dark:border-zinc-700 dark:bg-zinc-900"
        >

            @csrf
            @method('PUT')


            {{-- Form Fields --}}
            <div class="space-y-6">

                @include('teacher.classes._form')

            </div>


            {{-- Form Actions --}}
            <div class="mt-8 flex items-center justify-end gap-3 border-t border-zinc-100 pt-6
                        dark:border-zinc-700">

                <a
                    href="{{ route('teacher.classes.show', $class) }}"
                    class="rounded-xl px-5 py-3 font-semibold text-zinc-600
                           transition hover:bg-zinc-100
                           dark:text-zinc-300 dark:hover:bg-zinc-800"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white
                           shadow-sm transition hover:bg-blue-700 hover:shadow-md"
                >
                    Save Changes
                </button>

            </div>

        </form>


        {{-- Danger Zone --}}
        <div class="max-w-3xl rounded-2xl border border-red-200 bg-red-50 p-6
                    dark:border-red-900 dark:bg-red-950/30">

            <h2 class="text-lg font-bold text-red-700 dark:text-red-400">
                Danger Zone
            </h2>

            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                Deleting this class cannot be undone.
            </p>


            <form
                action="{{ route('teacher.classes.destroy', $class) }}"
                method="POST"
                class="mt-5"
                onsubmit="return confirm('Are you sure you want to delete this class?');"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-xl bg-red-600 px-6 py-3 font-semibold text-white
                           shadow-sm transition hover:bg-red-700 hover:shadow-md"
                >
                    Delete Class
                </button>

            </form>

        </div>

    </div>

</x-layouts::app>