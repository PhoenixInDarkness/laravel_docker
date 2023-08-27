<!-- resources/views/components/x-input.blade.php -->
<div>
    <label for="{{ $attributes['id'] }}" class="block font-medium text-sm text-gray-700">{{ $slot }}</label>
    <input {{ $attributes->merge(['class' => 'form-control']) }}>
    @if ($errors->has($attributes['name']))
        <p class="mt-2 text-sm text-red-600">{{ $errors->first($attributes['name']) }}</p>
    @endif
</div>
