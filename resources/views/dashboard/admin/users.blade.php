@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <form action="" method="POST">
            @csrf
            <table class="w-full">
                <tr class="border-black border-b-2">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uprawnienia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-red-500">Usuń</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zmień uprawnienia</th>
                </tr>
                @foreach($users as $user)
                    <tr class="border-b-2">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->permission_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"><input type="checkbox" name="user_delete"/></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <select name="permission">
                                @foreach($permissions as $permission)
                                    @if($permission->id != $user->permission_id)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @else
                                        <option value="{{ $permission->name }}" selected="selected">{{ $permission->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </table>
            <button type="submit" class="p-2 m-2 rounded-full float-right bg-gray-200 hover:bg-gray-400">
                Zatwierdź zmiany
            </button>
        </form>
    </div>
@endsection