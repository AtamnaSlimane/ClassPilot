<form
    method="POST"
    action="{{ $action }}"
    enctype="multipart/form-data"
    class="space-y-6"
>

    @csrf

    @if($method === 'PUT')
        @method('PUT')
    @endif


    {{-- Class --}}
    <flux:field>

        <flux:label>
            Class
        </flux:label>

        <flux:select name="academy_class_id">

            <flux:select.option value="">
                Select a class
            </flux:select.option>

            @foreach($classes as $class)

                <flux:select.option
                    value="{{ $class->id }}"
                    :selected="old(
                        'academy_class_id',
                        $homework?->academy_class_id
                    ) == $class->id"
                >
                    {{ $class->name }}
                </flux:select.option>

            @endforeach

        </flux:select>

        @error('academy_class_id')
            <flux:error>{{ $message }}</flux:error>
        @enderror

    </flux:field>


    {{-- Title --}}
    <flux:field>

        <flux:label>
            Title
        </flux:label>

        <flux:input
            name="title"
            value="{{ old('title', $homework?->title) }}"
            placeholder="e.g. Mathematics exercises"
        />

        @error('title')
            <flux:error>{{ $message }}</flux:error>
        @enderror

    </flux:field>


    {{-- Instructions --}}
    <flux:field>

        <flux:label>
            Instructions
        </flux:label>

        <flux:textarea
            name="instructions"
            rows="6"
            placeholder="Add instructions for your students..."
        >{{ old('instructions', $homework?->instructions) }}</flux:textarea>

        @error('instructions')
            <flux:error>{{ $message }}</flux:error>
        @enderror

    </flux:field>


    {{-- Due date --}}
    <flux:field>

        <flux:label>
            Due date
        </flux:label>

        <flux:input
            type="date"
            name="due_date"
            value="{{ old(
                'due_date',
                $homework?->due_date?->format('Y-m-d')
            ) }}"
        />

        @error('due_date')
            <flux:error>{{ $message }}</flux:error>
        @enderror

    </flux:field>


    {{-- File --}}
    <flux:field>

        <flux:label>
            File
        </flux:label>

        <flux:input
            type="file"
            name="file"
        />

        <flux:description>
            PDF, Word, PowerPoint, Excel, images or ZIP files. Maximum 10 MB.
        </flux:description>

        @if($homework?->file_path)

            <div class="mt-3 flex items-center gap-3 rounded-lg bg-zinc-50 p-3 dark:bg-zinc-900">

                <flux:icon
                    name="paper-clip"
                    class="size-5 text-zinc-400"
                />

                <flux:text class="text-sm">
                    Existing attachment
                </flux:text>

            </div>

        @endif

        @error('file')
            <flux:error>{{ $message }}</flux:error>
        @enderror

    </flux:field>


    {{-- Submit --}}
    <div class="flex items-center justify-end gap-3 border-t border-zinc-200 pt-5 dark:border-zinc-800">

        <flux:button
            href="{{ $cancelUrl }}"
            variant="ghost"
        >
            Cancel
        </flux:button>

        <flux:button
            type="submit"
            variant="primary"
            icon="check"
        >
            {{ $submitLabel }}
        </flux:button>

    </div>

</form>
