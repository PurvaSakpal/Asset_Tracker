@extends('master')
@section('content')
<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <form action="{{route('post.editassettype')}}" method="post">
        @csrf
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-success">{{Session::get('error')}}</div>
        @endif
        <div class="container">
            <h1 class="text-success">Add Asset Type</h1>
            <input type="hidden" value="{{$asset->id}}" name="hid">
            <div class="form-group">
                <label for="type" class="col-2">Asset Type</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="type" name="type" value="{{$asset->type}}">
                </div>
            </div>
            @if($errors->has('type'))
            <div class="alert alert-danger">{{$errors->first('type')}}</div>
            @endif
            <div class="form-group">
                <label for="description" class="col-2">Asset Description</label>
                <div class="col-10">
                    <textarea name="description" class="form-control" id="description" cols="30" rows="7">{{$asset->description}}</textarea>
                </div>
            </div>
            @if($errors->has('description'))
            <div class="alert alert-danger">{{$errors->first('description')}}</div>
            @endif
            <div class="form-group">
                <button class="btn btn-success" name="submit">Submit</button>
            </div>
        </div>
    </form>
    </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@stop
