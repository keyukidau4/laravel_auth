<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Custom Authentication</title>
</head>

<body>

        <div class="container">
                <div class="row" style="margin-left: auto;">
                        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
                                <h3>Login</h3>
                                <hr>
                                <form action="{{route('login-user')}}" method="POST">
                                        @if(Session::has('success'))
                                        <div class="alert alert-success">
                                                {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if(Session::has('fail'))
                                        <div class="alert alert-danger">
                                                {{Session::get('fail')}}
                                        </div>
                                        @endif
                                        @csrf
                                        <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" placeholder="Enter Your Email" name="email" value="{{old('email')}}">
                                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" placeholder="Enter Your Password" name="password" value="">
                                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="form-group" style="margin-top: 20px;">
                                                <button class="btn btn-block btn-primary" type="submit">Login</button>
                                        </div>
                                        <br>
                                        <a href="registration">New User !! Register Here</a>
                                </form>
                        </div>
                        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
                                <img src="../auth/green-round-glossy-login-icon-vector-2976248.jpeg" class="img-thumbnail" alt="...">
                        </div>
                </div>
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>