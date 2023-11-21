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
      {{-- livewire ja evita varios clicks no botão, caso não usar wire:loading.attr="disabled" --}}
      {{-- wire:loading.class --}}
      <x-primary-button class="ml-3">
        <span wire:loading wire:target="save" class="animate-bounce mr-1">🔥</span>
        {{ __('Save') }}
      </x-primary-button>
    </div>
    @dump($saving)
      <div x-data="{open: @entangle('saving')}">
        <div x-show="open">
          Exibe
        </div>
        <div>
          {{-- $wire.name = acessa variaveis do javascript do componente --}}
          Name:: <span x-text="$wire.name"></span>
        </div>
        {{-- $wire.save = acessa metodos do javascript do componente --}}
        <button type="button" @click="$wire.save()">
          saving 2
        </button>
        <button type="button" @click="open = false">
          back
        </button>
      </div>
  </form>
</div>
