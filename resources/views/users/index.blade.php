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
                                <th>Unit Name</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>User Code</th>
                                <th>App Users</th>
                                <th>User1 Phone</th>
                                <th>User1 Name</th>
                                <th>User1 Desgination</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $item)
                            <tr>
                                <td>{{$item->user_ip??'N/A'}}</td>
                                <td>{{$item->unit_name??'N/A'}}</td>
                                <td>{{$item->phone??'N/A'}}</td>
                                <td>{{($item->role=1)?'Admin':'User'}}</td>
                                <td>{{$item->user_code??'N/A'}}</td>
                                <td>{{$item->app_user??'N/A'}}</td>
                                <td>{{$item->user_phone1??'N/A'}}</td>
                                <td>{{$item->user_name1??'N/A'}}</td>
                                <td>{{$item->user_desgination1??'N/A'}}</td>
                                
                                <td>
                                    <a href="{{route('users.edit',$item->id)}}" class="btn btn-warning">Edit</a>
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
