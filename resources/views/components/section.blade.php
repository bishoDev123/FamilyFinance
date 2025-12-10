@props(['header' => 'Header'])

<x-section-header>{{ $header }}</x-section-header>
<main class="bg-gray-100">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
</main>
<x-section-divider />
