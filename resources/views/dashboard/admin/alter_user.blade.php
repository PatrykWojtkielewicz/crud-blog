@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <table class="w-full">
            <tr class="border-black border-b-2">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imie</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aktualne Uprawnienia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zmień uprawnienia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-red-500">Usuń</th>
            </tr>
                <form action="{{ route('dashboard.users.update') }}" method="POST">
                    @csrf
                    <tr class="border-b-2">
                        <td class="px-6 py-4 whitespace-nowrap"><input class="hidden" name="id" value="{{ $user->id }}">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->permission->name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            @foreach ($permissions as $permission)
                                <label class="label block">
                                    {{ $permission->name }}
                                    <input type="radio" name="permission_id"/>
                                </label>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"><input type="checkbox" name="user_delete"/></td>
                        <td>
                            <button type="submit" class="p-2 m-2 rounded-full float-right bg-gray-200 hover:bg-gray-400">
                                Zatwierdź zmiany
                            </button>
                        </td>
                    </tr>
                </form>
        </table>
    </div>
@endsection