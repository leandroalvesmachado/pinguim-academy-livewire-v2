<div>
    <x-text-input wire:model="text" />
    @error('text')
        <span class="text-red-400">{{ $message }}</span>
    @enderror
    <br />
    <br />
    <div class="text-dark">
        {{ $user->name }}
    </div>
</div>
