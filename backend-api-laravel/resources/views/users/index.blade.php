<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>User Listing Page</title>
</head>
<body>
    <div class="container-fluid bg-dark text-white d-flex justify-content-center align-items-center" style="height: 10vh;">
        Users List
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ url('/users/create') }}" class="btn btn-success btn-sm active mt-3" role="button" aria-pressed="true" style="margin-right: 150px;">Add New User</a>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="container bg-primary text-white d-flex justify-content-start mt-4" style="height: 5vh;">
                Users
            </div>

            <div class="d-flex justify-content-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary btn-l" data-toggle="modal" data-target="#userModal-{{ $user->id }}">
                                        View
                                    </button>

                                   
                                    <div class="modal fade" id="userModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel-{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="userModalLabel-{{ $user->id }}">User Info</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>ID: {{ $loop->iteration}}</h6>
                                                    <h6>Name: {{ $user->name }}</h6>
                                                    <h6>Username: {{ $user->username }}</h6>
                                                    <h6>Email: {{ $user->email }}</h6>
                                                    <h6>Phone No.: {{ $user->phone }}</h6>
                                                    <h6>Website: {{ $user->website }}</h6>
                                                    <h6>Company Name: {{ $user->company_name }}</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <button type="button" class="btn btn-secondary ml-1 mr-1 btn-l" data-toggle="modal" data-target="#editModal-{{ $user->id }}">
                                      Edit
                                  </button>
                                  <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $user->id }}">Edit User Info</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone No.</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="text" class="form-control" id="website" name="website" value="{{ $user->website }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="company_name">Company Name</label>
                                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $user->company_name }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('projectlist', $user->id)}}" class="btn btn-primary btn-sm active mr-1 btn-l" role="button" aria-pressed="true">Project</a>

                                <button type="button" class="btn btn-danger btn-l" data-toggle="modal" data-target="#deleteModal-{{ $user->id }}">
                                    Delete
                                </button>
                               
                                <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel-{{ $user->id }}">Confirm Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="deleteForm-{{ $user->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 