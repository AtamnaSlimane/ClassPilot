{{-- Name --}}
<div>
    <label
        for="name"
        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
    >
        Class Name
    </label>

    <input
        id="name"
        name="name"
        type="text"
        value="{{ old('name', $class->name ?? '') }}"
        placeholder="e.g. Computer Science 1"
        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
               text-zinc-900 outline-none transition
               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
    >
</div>


{{-- Description --}}
<div>
    <label
        for="description"
        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
    >
        Description
    </label>

    <textarea
        id="description"
        name="description"
        rows="4"
        placeholder="Describe this class..."
        class="mt-2 w-full resize-none rounded-xl border border-zinc-300 bg-white px-4 py-3
               text-zinc-900 outline-none transition
               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
    >{{ old('description', $class->description ?? '') }}</textarea>
</div>


{{-- Students --}}
<div>
    <label
        for="students-select"
        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
    >
        Students
    </label>

    <p class="mt-1 text-sm text-zinc-500">
        Select the students assigned to this class.
    </p>

    <select
        id="students-select"
        name="students[]"
        multiple
        class="mt-2 w-full"
    >

        @foreach($students as $student)

            <option
                value="{{ $student->id }}"
                @selected(
                    isset($class) && $class->students->contains($student->id)
                )
            >
                {{ $student->name }}
            </option>

        @endforeach

    </select>
</div>


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    new TomSelect('#students-select', {

        plugins: ['remove_button'],

        placeholder: 'Search students...',

        create: false,

    });

});
</script>

@endpush