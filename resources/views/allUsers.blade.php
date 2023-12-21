{{-- <h1> User's : </h1>

@foreach ( $users as $id => $user)
    <h2>
         | {{ $user->name }} | {{ $user->email }} | {{ $user->contact }} | {{ $user->status }} |
        <a href="{{ route('showUser' , $user->id) }}"> VIEW DETAILS  </a> | |
        <a href="{{ route('deleteUser' , $user->id) }}"> DELETE  </a>   | |
        <a href="{{ route('update' , $user->id) }}"> UPDATE  </a>
    </h2>
    @endforeach
    <h2> <a href="{{ route('newuser') }}"> Add User </a></h2>
 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>All User Data</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>All User's Data</h1>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                @foreach ($users as $id=>$user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->status }}</td>
                        <td><a href="{{ route('showUser' , $user->id ) }}" class="btn btn-primary btn-sm">View</a></td>
                        <td><a href="{{ route('update' , $user->id ) }}" class="btn btn-primary btn-sm">Update</a></td>
                        <td><a href="{{ route('deleteUser' , $user->id ) }}" class="btn btn-danger btn-sm btn-red">Delete</a></td>
                    </tr>
                @endforeach
                </table>
                <td><a href="{{ route('newuser' ) }}" class="btn btn-primary btn-md btn-red">Add User</a></td>
            </div>
        </div>
    </div>
</body>
</html>
