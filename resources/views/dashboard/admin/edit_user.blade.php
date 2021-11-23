@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <table class="w-full">
            <tr class="border-black border-b-2">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imie</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zmień uprawnienia</th>
            </tr>
            <form action="{{ url('dashboard/users/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <tr class="border-b-2">
                    <td class="px-6 py-4 whitespace-nowrap"><input class="hidden" name="id" value="{{ $user->id }}">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="text" name="user_name" value="{{ $user->name }}"/>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="text" name="user_email" value="{{ $user->email }}"/>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <select name="desired_permission">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" @if($permission->id == $user->permission_id) selected @endif>{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input type="submit" value="Zatwierdź zmiany" class="w-full p-4 my-2 rounded-xl hover:bg-gray-300 cursor-pointer"/>
                    </td>
                </tr>
            </form>
        </table>
    </div>
@endsection