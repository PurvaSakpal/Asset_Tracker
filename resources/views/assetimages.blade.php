@extends('master')
@section('content')
<div class="wrapper mt-3 ml-3">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">

                @foreach ($images as $img)
                    <div class="card mx-4 my-4">
                        <div class="card-body">
                           <img src="{{asset('/assetimages/'.$img->asset_image)}}" class="card-img-top" alt="Asset_img" width=200 height=200>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{route('assets')}}" class="btn btn-danger ml-4">Back</a>
    </div>
</div>
@endsection

