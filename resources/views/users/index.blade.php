@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All /</span> Users</h4>

        <!-- Striped Rows -->
        <div class="card">
            <div class="card-header">
                <h5 style="float:left;" >
                    Users
                </h5>
                <a href="{{url('users/create')}}" class="btn btn-success" style="float:right;" >Create</a>
            </div>
            <hr class="mt-2 mb-2">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>IP</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>User Code</th>
                                <th>Company</th>
                                <th>Marka</th>
                                <th>Desgination</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($company as $item1)
                            <tr>
                                <th colspan="9" style="text-align: center;"><b style="font-size: 16px;">{{$item1->name??''}}</b></th>
                            </tr>
                            @if($users->where('company_id',$item1->id)->count()>0)
                            @foreach ($users->where('company_id',$item1->id) as $item)
                            <tr>
                                <td>{{$item->user_ip??'N/A'}}</td>
                                <td>{{$item->unit_name??'N/A'}}</td>
                                <td>{{$item->phone??'N/A'}}</td>
                                <td>{{$item->role_name->name??''}}</td>
                                <td>{{$item->user_code??'N/A'}}</td>
                                <td>{{$item->company_name->name??''}}</td>
                                <td>{{$item->marka??''}}</td>
                                <td>{{$item->designation??'N/A'}}</td>
                                
                                <td>
                                    <a href="{{route('users.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                    <a class="btn btn-danger text-white"
                                            onclick="usersDelete{{ $item->id }}({{ $item->id }})">
                                            Delete
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9"><b>Users not found!</b></td>
                            </tr>
                            @endif
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
@foreach ($users as $item)
<script>
    function usersDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete User?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("deleteUser", ":id") }}';
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
