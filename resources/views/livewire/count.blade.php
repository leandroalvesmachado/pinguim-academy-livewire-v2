<div>
    <h1>LIVEWIRE COUNT COMPONENT</h1>
    {{-- <h1>{{ $this->lastName }}</h1> --}}
    <div>
        <x-text-input wire:model="name" />
        {{ $name }}
        <br><br>
        <x-primary-button wire:click="toggle" />
        <br><br>
        <x-primary-button wire:click="toggleComParametro('UPPER')">UPPER</x-primary-button>
        <br><br>
        <x-primary-button wire:click="toggleComParametro('LOWER')">LOWER</x-primary-button>
        <br><br>
        <x-primary-button wire:click="submit">Submit</x-primary-button>
        <br><br>
        <x-primary-button wire:click="send">SEND TO TODO</x-primary-button>
    </div>
    @foreach ($users as $user)
        {{ $user->name }}
        <br>
    @endforeach
</div>
