<div>
    @can('users.show')
        <x-show-button />
    @endcan
    @can('users.edit')
        <x-edit-button />
    @endcan
    @can('users.destroy')
        <x-delete-button />
    @endcan
</div>
