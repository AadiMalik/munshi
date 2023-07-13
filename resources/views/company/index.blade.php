@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All /</span> Companies</h4>

        <!-- Striped Rows -->
        <div class="card">
            <div class="card-header">
                <h5 style="float:left;">
                    Companies
                </h5>
                <a href="{{ url('company/create') }}" class="btn btn-success" style="float:right;">Create</a>
            </div>
            <hr class="mt-2 mb-2">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>CEO</th>
                                <th>Phone1</th>
                                <th>Phone2</th>
                                <th>Phone3</th>
                                <th>Phone4</th>
                                <th>Munshi</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($company as $item)
                                <tr>
                                    <td>{{ $item->id ?? 'N/A' }}</td>
                                    <td>
                                        @if ($item->logo != null)
                                            <img src="{{ asset($item->logo) }}" style="height: 60px; width:60px;"
                                                alt="">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $item->name ?? 'N/A' }}</td>
                                    <td>{{ $item->address ?? 'N/A' }}</td>
                                    <td>{{ $item->ceo ?? 'N/A' }}</td>
                                    <td>{{ $item->phone1 ?? 'N/A' }}</td>
                                    <td>{{ $item->phone2 ?? 'N/A' }}</td>
                                    <td>{{ $item->phone3 ?? 'N/A' }}</td>
                                    <td>{{ $item->phone4 ?? 'N/A' }}</td>
                                    <td>{{ $item->munshi ?? 'N/A' }}</td>
                                    <td>{{ $item->munshi_phone ?? 'N/A' }}</td>
                                    <td>
                                        <a class="btn btn-primary text-white"
                                        href="{{ url('users') }}?company_id={{$item->id}}">
                                            Users
                                        </a>
                                        <a href="{{ route('company.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <a class="btn btn-danger text-white"
                                            onclick="companyDelete{{ $item->id }}({{ $item->id }})">
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
    @foreach ($company as $item)
        <script>
            function companyDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete Company and Company Users?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('deleteCompany', ':id') }}';
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
