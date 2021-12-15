@extends('master')
@section('content')
<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <form action="{{route('post.editasset')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-success">{{Session::get('error')}}</div>
        @endif
        {{-- <input type="hidden" value="$asset->asset_code" value="code"> --}}
        <input type="hidden" value="{{$asset->id}}" name="id">
        <div class="container">
            <h1 class="text-success">Add Asset</h1>
            <div class="form-group">
                <label for="name" class="col-2">Asset Name</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="type" name="name" value="{{$asset->asset_name}}">
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
                        @foreach ($assettype as $assetty)
                           <option value="{{$assetty['id']}}">{{$assetty['type']}}</option>
                        @endforeach
                </select>
                </div>
            </div>
            @if($errors->has('type'))
            <div class="alert alert-danger">{{$errors->first('type')}}</div>
            @endif
            <div class="form-group">
                <label for="gridRadios1" class="col-2">Is Active?</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="gridRadios1" value="1" {{ ($asset->is_active == '1') ? 'checked' : ' ' }}>
                        <label class="form-check-label" for="gridRadios1">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="gridRadios2" value="0" {{ ($asset->is_active == '0') ? 'checked' : ' ' }}>
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
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@stop
