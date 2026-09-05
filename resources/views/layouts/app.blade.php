@stack('scripts')
<x-layouts::app.sidebar :title="$title ?? null">
    <flux:main class=" p-0 min-h-screen bg-[#607050]">
        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>
