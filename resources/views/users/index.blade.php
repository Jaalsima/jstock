<x-app-layout>
    <div class="flex flex-col justify-between min-h-screen">
        <x-home-title />
        <div class="p-6 m-4 shadow-md shadow-gray-300">
            <livewire:user-datatable />

            {{-- <ul>
                @foreach ($users as $key => $user)
                    <li>
                        <h1>{{ $user->name }}</h1>

                    </li>
                    <li>
                        <h1>{{ $user->email }}</h1>
                    </li>
                    <li>
                        @can('users.destroy')
                            <form action="{{ route('users.destroy', $user) }}" method="post">
                                @csrf
                                @method('delete')

                                <x-delete_button />

                            </form>
                        @endcan
                    </li>
                @endforeach
            </ul> --}}

        </div>
        <x-my-footer />
    </div>
</x-app-layout>
