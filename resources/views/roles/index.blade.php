@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All /</span> Roles</h4>

        <!-- Striped Rows -->
        <div class="card">
            <div class="card-header">
                <h5 style="float:left;" >
                    Roles
                </h5>
                <a href="{{url('roles/create')}}" class="btn btn-success" style="float:right;" >Create</a>
            </div>
            <hr class="mt-2 mb-2">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($roles as $item)
                            <tr>
                                <td>{{$item->id??'N/A'}}</td>
                                <td>{{$item->name??'N/A'}}</td>
                                <td>
                                    <a href="{{route('roles.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                    {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
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
