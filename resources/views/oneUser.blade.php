<h1>
   User ID = {{$user->id; }}<br>
   User Name = {{ $user->name; }} <br>
   User Email = {{$user->email;}} <br>
   User Contact = {{ $user->contact; }}<br>
   User Status = {{ $user->status;}} <br>
</h1>
<h2>
    <a href="{{ route('showusers') }}">Go to Home Page</a> | |
    <a href="{{ route('update' , $user->id ) }}">Update User</a>
</h2>
