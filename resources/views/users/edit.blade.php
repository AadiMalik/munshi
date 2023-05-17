@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit/</span> User</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Update User</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Phone No:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" disabled class="form-control" id="phone"
                                            placeholder="Phone no" value="{{$user->phone??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">User Code:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="user_code" class="form-control" id="phone"
                                            placeholder="User code" value="{{$user->user_code??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">App Users:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="app_user" class="form-control" id="phone"
                                            placeholder="App users" value="{{$user->app_user??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Phone:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="user_phone1" class="form-control" id="phone"
                                            placeholder="First user phone" value="{{$user->user_phone1??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Name:<span class="text-danger">*</span></label>
                                        <input type="text" step="any" name="user_name1" class="form-control" id="phone"
                                            placeholder="First user name" value="{{$user->user_name1??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Designation:<span class="text-danger">*</span></label>
                                        <input type="text" name="user_designation1" class="form-control" id="phone"
                                            placeholder="First user designation" value="{{$user->user_designation1??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Phone:</label>
                                        <input type="number" step="any" name="user_phone2" class="form-control" id="phone"
                                            placeholder="Second user phone" value="{{$user->user_phone2??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Name:</label>
                                        <input type="text" name="user_name2" class="form-control" id="phone"
                                            placeholder="Second user name" value="{{$user->user_name2??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Designation:</label>
                                        <input type="text" name="user_designation2" class="form-control" id="phone"
                                            placeholder="Second user designation" value="{{$user->user_designation2??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Company:<span class="text-danger">*</span></label>
                                        <input type="text" name="company" class="form-control" id="phone"
                                            placeholder="Company" value="{{$user->company??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="unit_name" class="form-control" id="unit_name"
                                            placeholder="Unit Name" value="{{$user->unit_name??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">User IP:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="user_ip" class="form-control" id="user_ip"
                                            placeholder="User IP" value="{{$user->user_ip??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Worker Code:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="unit_worker_code" class="form-control" id="unit_worker_code"
                                            placeholder="Unit worker code" value="{{$user->unit_worker_code??''}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Password:</label>
                                        <input type="text" name="unit_password" class="form-control" id="unit_password"
                                            placeholder="Unit Password" value="{{$user->unit_password??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Password:</label>
                                        <input type="text" name="password" class="form-control" id="password"
                                            placeholder="Password" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Role:<span class="text-danger">*</span></label>
                                        <select name="role" class="form-control" id="role">
                                            <option selected disabled>--Select Role--</option>
                                            <option value="0" {{($user->role=0)?'selected':''}}>User</option>
                                            <option value="1" {{($user->role=1)?'selected':''}}>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">New Image:</label>
                                        <input type="file" name="image" class="form-control" id="image" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="">old Image:</label>
                                        <img src="{{asset($user->image??'')}}" style="width:40px; height:40px;" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
