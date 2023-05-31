@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All /</span> Adds</h4>

        <!-- Striped Rows -->
        <div class="card">
            <div class="card-header">
                <h5 style="float:left;" >
                    Adds
                </h5>
                <a href="{{url('adds/create')}}" class="btn btn-success" style="float:right;" >Create</a>
            </div>
            <hr class="mt-2 mb-2">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($adds as $item)
                            <tr>
                                <td>{{$item->id??'N/A'}}</td>
                                <td>@if($item->image!=null) <img src="{{asset($item->image)}}" style="height: 60px; width:60px;" alt="">@else N/A @endif</td>
                                <td>{{$item->description??'N/A'}}</td>
                                <td>
                                    <a href="{{route('adds.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                    <a class="btn btn-danger text-white"
                                            onclick="addsDelete{{ $item->id }}({{ $item->id }})">
                                            Delete
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
    <!-- / Content -->
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
@foreach ($adds as $item)
<script>
    function addsDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete Add?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("deleteAdds", ":id") }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: url,
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        iziToast.success({
                            message: data.message,
                            position: 'topRight'
                        });
                        window.location.reload();

                    }
                });
            }
        });

    }
</script>
@endforeach
@endsection
