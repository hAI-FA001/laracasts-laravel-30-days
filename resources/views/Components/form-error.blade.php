@props(['name'])

<div class="mt-2">
    @error($name)
        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
    @enderror
</div>
