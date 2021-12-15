<!doctype HTML>
<html>
    <head>
        @include('includes.head')
        <title>Login Page</title>
    </head>
    <style>
        .login,
        .image {
        min-height: 100vh;
        }

        .bg-image {
        background-image: url('https://bootstrapious.com/i/snippets/sn-page-split/bg.jpg');
        background-size: cover;
        background-position: center center;
        }
    </style>
    <body>
        <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4 mb-4">Sign In </h3>
                                <!-- <p class="text-muted mb-4">Create a login split page using Bootstrap 4.</p> -->
                                <form action="{{route('postLogin')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="email" type="email" name="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" onchange="remember()">
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                    @endif
                                    <div class="form-group mb-3">
                                        <input id="password" type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                    @endif
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                                    @endif
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input" name="cbox">
                                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                    <!-- <div class="text-center d-flex justify-content-between mt-4"><p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted">
                                            <u>Boostrapious</u></a></p></div> -->
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
    <script>
        function remember()
        {
            if("@php echo $_COOKIE['ecook']; @endphp"!= undefined)
            {
                if("@php echo $_COOKIE['ecook']; @endphp" == document.getElementById("email").value)
                {
                document.getElementById("password").value = "@php echo $_COOKIE['pcook']; @endphp";
                }
            }
            else{
                document.getElementById("password").value="";
            }
        }
</script>
        @include('includes.script')
    </body>
</html>
