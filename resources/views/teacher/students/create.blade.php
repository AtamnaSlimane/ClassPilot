<x-layouts::app :title="__('Add Student')">

    <div class="space-y-8">

        {{-- Page Header --}}
        <div>
            <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                Add Student
            </h1>

            <p class="mt-2 text-lg text-zinc-500">
                The student will automatically be assigned to you.
            </p>
        </div>


        {{-- Student Form --}}
        <form
            method="POST"
            action="{{ route('teacher.students.store') }}"
            class="max-w-3xl rounded-2xl border border-zinc-200 bg-white p-8 shadow-sm
                   dark:border-zinc-700 dark:bg-zinc-900"
        >

            @csrf

            <div class="space-y-6">

                {{-- Name --}}
                <div>
                    <label
                        for="name"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Name
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter student's name"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >

                    @error('name')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Email --}}
                <div>
                    <label
                        for="email"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="student@example.com"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >

                    @error('email')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Phone --}}
                <div>
                    <label
                        for="phone"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Phone
                    </label>

                    <input
                        id="phone"
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Enter phone number"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >
                </div>


                {{-- Password --}}
                <div>
                    <label
                        for="password"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Create a password"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Confirm Password --}}
                <div>
                    <label
                        for="password_confirmation"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Confirm Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm password"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >
                </div>


                {{-- Parent --}}
                <div>
                    <label
                        for="parent_id"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Parent
                    </label>

                    <select
                        id="parent_id"
                        name="parent_id"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >

                        <option value="">
                            No Parent
                        </option>

                        @foreach($parents as $parent)

                            <option
                                value="{{ $parent->id }}"
                                @selected(old('parent_id') == $parent->id)
                            >
                                {{ $parent->name }}
                            </option>

                        @endforeach

                    </select>
                </div>


                {{-- Status --}}
                <div>
                    <label
                        for="status"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="mt-2 w-full rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >

                        <option
                            value="active"
                            @selected(old('status', 'active') === 'active')
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            @selected(old('status') === 'inactive')
                        >
                            Inactive
                        </option>

                    </select>
                </div>


                {{-- Notes --}}
                <div>
                    <label
                        for="notes"
                        class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"
                    >
                        Notes
                    </label>

                    <textarea
                        id="notes"
                        name="notes"
                        rows="4"
                        placeholder="Add any notes about the student..."
                        class="mt-2 w-full resize-none rounded-xl border border-zinc-300 bg-white px-4 py-3
                               text-zinc-900 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20
                               dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >{{ old('notes') }}</textarea>
                </div>

            </div>


            {{-- Actions --}}
            <div class="mt-8 flex items-center justify-end gap-3 border-t border-zinc-100 pt-6
                        dark:border-zinc-700">

                <a
                    href="{{ route('teacher.students.index') }}"
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
                    Create Student
                </button>

            </div>

        </form>

    </div>

</x-layouts::app>