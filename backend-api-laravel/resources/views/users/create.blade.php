<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Add New User Page</title>
  </head>
  <body>
   
    <div class="container-fluid bg-dark text-white d-flex justify-content-center align-items-center" style="height: 10vh;">
        User Page
    </div>
    
   
    <div class="d-flex justify-content-end">
        <a href="{{url('/')}}" class="btn btn-dark btn-sm active mt-3" role="button" aria-pressed="true" style="margin-right: 160px;">Back</a>
    </div>
  
  
    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="container bg-primary text-white d-flex justify-content-start mt-4" style="height: 5vh;">
                Add New Users
            </div>

            
          
            <div class="d-flex justify-content-center mt-2">
                <form style="width: 50%" action="{{url('/users/createuser')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="number">Phone No.</label>
                        <input type="number" class="form-control" id="number" placeholder="Enter your No." name="number">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your e-mail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" placeholder="Enter your Website Name" name="website">
                    </div>
                    <div class="form-group">
                        <label for="companyname">Company_name</label>
                        <input type="text" class="form-control" id="companyname" placeholder="Enter your Company Name" name="company_name">
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <input type="submit" 
                        value="save"
                        class="btn btn-primary"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
