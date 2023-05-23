@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add/</span> User</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Create User</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Phone No:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="phone" class="form-control" id="phone"
                                            placeholder="Phone no" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">User Code:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="user_code" class="form-control" id="phone"
                                            placeholder="User code" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">App Users:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="app_user" class="form-control" id="phone"
                                            placeholder="App users" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Phone:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="user_phone1" class="form-control" id="phone"
                                            placeholder="First user phone" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Name:<span class="text-danger">*</span></label>
                                        <input type="text" step="any" name="user_name1" class="form-control" id="phone"
                                            placeholder="First user name" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Designation:<span class="text-danger">*</span></label>
                                        <input type="text" name="user_designation1" class="form-control" id="phone"
                                            placeholder="First user designation" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Phone:</label>
                                        <input type="number" step="any" name="user_phone2" class="form-control" id="phone"
                                            placeholder="Second user phone" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Name:</label>
                                        <input type="text" step="any" name="user_name2" class="form-control" id="phone"
                                            placeholder="Second user name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Designation:</label>
                                        <input type="text" step="any" name="user_designation2" class="form-control" id="phone"
                                            placeholder="Second user designation" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Company:<span class="text-danger">*</span></label>
                                        <input type="text" name="company" class="form-control" id="phone"
                                            placeholder="Company" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="unit_name" class="form-control" id="unit_name"
                                            placeholder="Unit Name" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">User IP:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="user_ip" class="form-control" id="user_ip"
                                            placeholder="User IP" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Worker Code:<span class="text-danger">*</span></label>
                                        <input type="number" step="any" name="unit_worker_code" class="form-control" id="unit_worker_code"
                                            placeholder="Unit worker code" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Password:<span class="text-danger">*</span></label>
                                        <input type="text" name="unit_password" class="form-control" id="unit_password"
                                            placeholder="Unit Password" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Password:<span class="text-danger">*</span></label>
                                        <input type="text" name="password" value="abc123" class="form-control" id="password"
                                            placeholder="Password" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Role:<span class="text-danger">*</span></label>
                                        <select name="role" class="form-control" id="role">
                                            <option selected disabled>--Select Role--</option>
                                            @foreach ($roles as $item)
                                            <option value="{{$item->id}}">{{$item->name??''}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Image:<span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control" id="image" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
