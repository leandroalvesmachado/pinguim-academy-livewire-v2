<div>
  <h1>Users</h1>
  <div class="my-4">
    <x-text-input wire:model="search" placeholder="Search..."/>
    <x-text-input wire:model="searchEmail" placeholder="Email Search..."/>
    <select wire:model="limit">
        <option value="5">5</option>
        <option value="15">15</option>
        <option value="50">50</option>
    </select>
  </div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sort('name')">
            @if($sortBy == 'name')
              <span>@if($sortDir == 'asc')⬇️@else⬆️@endif</span>
            @endif
            Nome
          </th>
          <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sort('email')">
            @if($sortBy == 'email')
              <span>@if($sortDir == 'asc')⬇️@else⬆️@endif</span>
            @endif
            E-mail
          </th>
          <th scope="col" class="px-6 py-3">
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4">
            {{ $user->name }}
          </td>
          <td class="px-6 py-4">
            {{ $user->email }}
          </td>
          <td class="px-6 py-4">
            <livewire:editar-usuario :user="$user" wire:key="edit-user-{{ $user->id }}" />
          </td>
        </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>
  {{ $users->links() }}
</div>
