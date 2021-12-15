@extends('master')
@section('content')
<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <form action="{{route('post.asset')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-success">{{Session::get('error')}}</div>
                    @endif
                    <div class="container">
                        <h1 class="text-success">Add Asset</h1>
                        <div class="form-group">
                            <label for="name" class="col-2">Asset Name</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="type" name="name">
                            </div>
                        </div>
                        @if($errors->has('name'))
                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                        @endif
                        <div class="form-group">
                            <label for="type" class="col-2">Asset Type</label>
                            <div class="col-10">
                            <select name="type" id="type" class="form-control">
                                <option value="">Asset Type</option>
                                    @foreach ($assets as $asset)
                                    <option value="{{$asset['id']}}">{{$asset['type']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        @if($errors->has('type'))
                        <div class="alert alert-danger">{{$errors->first('type')}}</div>
                        @endif
                        <div class="form-group">
                            <label for="image" class="col-2">Asset Image</label>
                            <div class="col-10">
                                <input type="file" class="form-control" id="image" name="image[]" multiple>
                            </div>
                        </div>
                        @if($errors->has('image'))
                        <div class="alert alert-danger">{{$errors->first('image')}}</div>
                        @endif
                        <div class="form-group">
                            <label for="gridRadios1" class="col-2">Is Active?</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="active" id="gridRadios1" value="1" checked="yes">
                                    <label class="form-check-label" for="gridRadios1">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="gridRadios2" value="0">
                                <label class="form-check-label" for="gridRadios2">Inactive</label>
                            </div>
                        </div>
                        @if($errors->has('active'))
                        <div class="alert alert-danger">{{$errors->first('active')}}</div>
                        @endif
                        <div class="form-group mt-3">
                            <button class="btn btn-success" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@stop
