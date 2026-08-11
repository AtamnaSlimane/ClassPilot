@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="ClassPilot" {{ $attributes }}>
        <x-slot name="logo" class="flex size-8 items-center justify-center">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaujB1LyYAXHl_3eVsv3c0f7O7xV2rdiwh7c3zTV3Hrw&s=10"
                alt="ClassPilot"
                class="size-8 object-contain"
            />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="ClassPilot" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
            <x-app-logo-icon class="size-5 fill-current text-white dark:text-black" />
        </x-slot>
    </flux:brand>
@endif
