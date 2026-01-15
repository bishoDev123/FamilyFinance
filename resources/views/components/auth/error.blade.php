@props(['field' => 'title'])

<div class="text-red-500 text-xs italic">

    @error($field)
    {{$message}}
    @enderror
</div>
