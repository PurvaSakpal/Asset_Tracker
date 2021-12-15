@extends('master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".delete").click(function(e){
            var aid=$(this).attr("aid");
            if(confirm("Do you want to delete?")){

            $.ajax({
                url:"{{url('/deleteAssetType')}}",
                type:'post',
                method:'patch',
                data:{_token:'{{ csrf_token() }}',aid:aid},
                success:function(response){
                    window.location.reload();
                },
                error: function(jqXHR, status, err){
                     window.location.reload();
                }
            })
            }
        })
    })
</script>
<div class="wrapper mt-3 ml-3">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- card starts --}}
        <div class="card">
            <div class="card-body">
                <a href="{{route('add.assettype')}}" class="btn btn-danger mb-3">Add Asset Type</a>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>S.no</th>
                        <th>Asset Type</th>
                        <th>Asset Description</th>
                        <th>Action</th>
                    </tr>

                        @foreach ($assettype as $asset)
                            <tr>
                                <td>{{$asset->id}}</td>
                                <td>{{$asset->type}}</td>
                                <td>{{$asset->description}}</td>
                                <td>
                                    <a href="/editAssetType/{{$asset->id}}" class="btn btn-success">Edit</a>
                                    <a href="javascript:void(0)" aid="{{$asset->id}}" class="btn btn-danger delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div>
            {{$assettype->links()}}
        </div>
    </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<style>
    .w-5{
        display: none;
    }
</style>
@endsection
