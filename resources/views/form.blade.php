<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Add New User</h1>
                <form action="{{ route('adduser') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control"  value="{{old('userid')}}" name="userid">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{old('username')}}" name="username">
                        <span class="text-danger">
                            @error('username')
                                {{$message}}
                            @enderror
                        </span>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{old('useremail')}}" name="useremail">
                        <span class="text-danger">
                            @error('useremail')
                                {{$message}}
                            @enderror
                        </span>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" value="{{old('usercontact')}}" name="usercontact">
                        <span class="text-danger">
                            @error('usercontact')
                                {{$message}}
                            @enderror
                        </span>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" value="{{old('userstatus')}}" name="userstatus">
                        <span class="text-danger">
                            @error('userstatus')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
