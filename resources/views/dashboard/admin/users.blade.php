@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <table class="w-full">
            <tr class="border-black border-b-2">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imie</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aktualne Uprawnienia</th>
            </tr>
            @foreach($users as $user)
                <tr class="border-b-2">
                    <td class="px-6 py-4 whitespace-nowrap" name="id">{{ $user->id }}<input class="hidden" name="id" value="{{ $user->id }}"/></td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->permission->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection