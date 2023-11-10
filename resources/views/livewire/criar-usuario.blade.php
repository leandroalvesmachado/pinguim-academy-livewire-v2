<div>
  <form method="POST" wire:submit.prevent="save">
    @csrf
    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input
        wire:model.defer="name"
        id="name"
        class="block mt-1 w-full"
        type="text"
        name="name"
        :value="old('name')"
      />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input
        wire:model.defer="email"
        id="email"
        class="block mt-1 w-full"
        type="email"
        name="email"
        :value="old('email')"
      />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="flex items-center justify-end mt-4">
      <x-primary-button class="ml-4">
        {{ __('Save') }}
      </x-primary-button>
    </div>
  </form>
</div>
