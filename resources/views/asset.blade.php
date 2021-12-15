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
    });
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  })
</script>
<div class="wrapper mt-3 ml-3">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    {{-- card starts --}}
    <div class="card">
        <div class="card-body">
            <a href="{{route('add.asset')}}" class="btn btn-danger mb-3">Add Asset</a>
            <table class="table table-bordered table-striped mx-3 my-3" id="example1">
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
                            <a href="/assetimage/{{$asset->id}}" class="btn btn-warning">View</a>
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
    </div>
    {{-- card ends --}}
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<style>
    .w-5{
        display: none;
    }
</style>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
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
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
@endsection
