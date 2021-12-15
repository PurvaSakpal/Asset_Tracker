@php 
 $admin=session('admin');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
<title>Dashboard</title>
</head>
    <body>
        @include('includes.nav')
        <div >
            <section class="container-fluid row">
                @include('includes.sidebar')
                <section class="col-md-12">
                    @yield('content')
                </section>
            </section>
        </div>
    @include('includes.script')
    </body>
</html>