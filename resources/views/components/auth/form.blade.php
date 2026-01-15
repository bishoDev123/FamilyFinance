@props(['action' => '#', 'method' => 'POST'])

<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="{{ $action }}" method="POST" class="space-y-6">
        @csrf
        @if (strtoupper($method) !== 'POST')
            @method($method)
        @endif
        {{ $slot }}
    </form>
</div>
