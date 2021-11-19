@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <form action="{{ route('dashboard/users/show_user') }}" method="POST">
            @csrf
            <label for="user-select">Wybierz użytkownika którego chcesz edytować</label><br/>
            <select name="user_id" id="user-select">
                <option selected="true" disabled>Proszę wybrać użytkownika</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}, {{ $user->email }}</option>
                @endforeach
            </select>
            <button type="submit" class="p-2 m-2 rounded-full bg-gray-200 hover:bg-gray-400">
                Edytuj
            </button>
        </form>
    </div>
@endsection