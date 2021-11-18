@extends('home')

@section('dashboard_content')
abc
    <div class="container m-auto">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium perspiciatis saepe quo, eaque illo velit voluptatum distinctio nesciunt ex laboriosam rem culpa quam! Voluptatem sequi et ipsum recusandae cum deleniti asperiores ut explicabo, exercitationem ipsam deserunt perferendis iste rem repellendus neque modi? Earum saepe corrupti dicta, voluptatum ad atque est distinctio debitis optio minus. Amet, beatae et aspernatur ipsam ipsa eaque corrupti esse facilis ducimus maiores voluptatem odio mollitia numquam eius soluta! Et praesentium qui illo dicta expedita blanditiis vel veritatis obcaecati at, sapiente illum modi animi asperiores ab libero dignissimos nobis nam, doloremque quae assumenda consequatur earum cumque sed!
        <ol>
            @foreach($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ol>
    </div>
@endsection