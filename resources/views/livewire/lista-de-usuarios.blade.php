<div>
  <h1>Users</h1>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Nome
          </th>
          <th scope="col" class="px-6 py-3">
            E-mail
          </th>
          <th scope="col" class="px-6 py-3">
            Ações
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
</div>
