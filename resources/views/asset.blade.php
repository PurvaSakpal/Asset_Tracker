@extends('master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".delete").click(function(e){
            var aid=$(this).attr("aid");
            if(confirm("Do you want to delete?")){

            $.ajax({
                url:"{{url('/deleteAsset')}}",
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
    <!-- Content Header (Page header) -->
        <a href="{{route('add.asset')}}" class="btn btn-danger mb-3">Add Asset</a>
        <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>S.no</th>
                <th>Asset name</th>
                <th>Asset Code</th>
                <th>Asset Type</th>
                <th>Asset Status</th>
                <th>Action</th>
            </tr>

            @foreach ($assets as $asset)
                <tr>
                    <td>{{$asset->id}}</td>
                    <td>{{$asset->asset_name}}</td>
                    <td>{{$asset->asset_code}}</td>
                    <td>{{$asset->assettype_name}}</td>
                    <td>{{$asset->is_active}}</td>
                    <td>
                        <a href="/editAsset/{{$asset->id}}" class="btn btn-success">Edit</a>
                        <a href="javascript:void(0)" aid="{{$asset->id}}" class="btn btn-danger delete">Delete</a>
                    </td>
                </tr>

            @endforeach
        </table>
        <div>
            {{$assets->links()}}
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

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
