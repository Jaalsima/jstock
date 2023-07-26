<div>
    @can('users.show')
        <x-show-button />
    @endcan
    @can('users.edit')
        <x-edit-button />
    @endcan

    @can('users.destroy')
        <button type="button" wire:click="deleteUser({{ $row->id }})"
            class="m-4 py-2 px-4 rounded shadow-md shadow-red-300 bg-red-50 text-red-700 text-bold">Eliminar</button>
    @endcan
</div>
