@foreach($user as $users)
    <h1>{{$users->name}}</h1>
    <h2>role: {{$users->role->slug}}</h2>
@endforeach