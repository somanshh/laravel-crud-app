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
                <h1>Update User</h1>
                <form action="{{ route('updateUser' , $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" >Id</label>
                        <input type="text" class="form-control" value="{{ $data->id }}"  name="username" readonly accept="false"
                        >
                        <label class="form-label" >Name</label>
                        <input type="text" class="form-control" value="{{ $data->name }}"  name="username" placeholder="Enter the new name">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $data->email }}" name="useremail" placeholder="Enter the new email">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" name="usercontact" value="{{ $data->contact }}" placeholder="Enter the new Contact number">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" name="userstatus" value="{{ $data->status }}" placeholder="Enter the new status">
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
