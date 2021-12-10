<!doctype HTML>
<html>
    <head>
        @include('includes.head')
        <title>Login Page</title>
    </head>
    <body>
        <div class="container">
            <nav>
            <div class="jumbotron">
                <h1>Login</h1>
            </div>
            </nav>
            <form action="" method="post">
                @csrf()
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email">
                </div>  
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg" name="login">Login</button>
                </div>
            </form>
        </div>
        @include('includes.script')
    </body>
</html>