@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Profile</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.update',Auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Phone No:</label>
                                        <input type="number" step="any" disabled class="form-control" id="phone"
                                            placeholder="Phone no" value="{{Auth()->user()->phone??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">User Code:</label>
                                        <input type="number" step="any" name="user_code" class="form-control" id="phone"
                                            placeholder="User code" value="{{Auth()->user()->user_code??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">App Users:</label>
                                        <input type="number" step="any" name="app_user" class="form-control" id="phone"
                                            placeholder="App users" value="{{Auth()->user()->app_user??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Phone:</label>
                                        <input type="number" step="any" name="user_phone1" class="form-control" id="phone"
                                            placeholder="First user phone" value="{{Auth()->user()->user_phone1??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Name:</label>
                                        <input type="text" step="any" name="user_name1" class="form-control" id="phone"
                                            placeholder="First user name" value="{{Auth()->user()->user_name1??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">1st User Designation:</label>
                                        <input type="text" name="user_designation1" class="form-control" id="phone"
                                            placeholder="First user designation" value="{{Auth()->user()->user_designation1??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Phone:</label>
                                        <input type="number" step="any" name="user_phone2" class="form-control" id="phone"
                                            placeholder="Second user phone" value="{{Auth()->user()->user_phone2??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Name:</label>
                                        <input type="text" name="user_name2" class="form-control" id="phone"
                                            placeholder="Second user name" value="{{Auth()->user()->user_name2??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">2nd User Designation:</label>
                                        <input type="text" name="user_designation2" class="form-control" id="phone"
                                            placeholder="Second user designation" value="{{Auth()->user()->user_designation2??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Company:</label>
                                        <input type="text" name="company" class="form-control" id="phone"
                                            placeholder="Company" value="{{Auth()->user()->company??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Name:</label>
                                        <input type="text" name="unit_name" class="form-control" id="unit_name"
                                            placeholder="Unit Name" value="{{Auth()->user()->unit_name??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">User IP:</label>
                                        <input type="number" step="any" name="user_ip" class="form-control" id="user_ip"
                                            placeholder="User IP" value="{{Auth()->user()->user_ip??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Worker Code:</label>
                                        <input type="number" step="any" name="unit_worker_code" class="form-control" id="unit_worker_code"
                                            placeholder="Unit worker code" value="{{Auth()->user()->unit_worker_code??''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="">Unit Password:</label>
                                        <input type="text" name="unit_password" class="form-control" id="unit_password"
                                            placeholder="Unit Password" value="{{Auth()->user()->unit_password??''}}" />
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
                                        <label class="">New Image:</label>
                                        <input type="file" name="image" class="form-control" id="image" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="">old Image:</label>
                                        <img src="{{asset(Auth()->user()->image??'')}}" style="width:40px; height:40px;" alt="">
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
