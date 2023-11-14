<div>
  <x-secondary-button wire:click="download">
    Download
  </x-secondary-button>
  <form wire:submit.prevent="save">
    <div>
      <x-input-label for="avatar" :value="__('Avatar')" />

      @if ($avatar)
        <img src="{{  $this->avatar->temporaryUrl() }}" />
      @endif

      <x-text-input
        wire:model.defer="avatar"
        id="avatar"
        class="block mt-1 w-full"
        type="file"
        name="avatar"
        :value="old('avatar')"
      />
      <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
    </div>
    <x-primary-button>
      Save
    </x-primary-button>
  </form>
</div>
