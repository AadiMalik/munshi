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
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <b style="font-size:18px; color:#696cff;">User:</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="border:2px solid #DC143C;background: #f8bf9e; padding:10px;">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">User Name:<span class="text-danger">*</span></label>
                                                <input type="text" name="unit_name" class="form-control" id="unit_name"
                                                    placeholder="User Name" value="{{ $user->unit_name ?? '' }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">IP:<span class="text-danger">*</span></label>
                                                <input type="text" step="any" name="user_ip" class="form-control"
                                                    id="user_ip" placeholder="User IP" value="{{ $user->user_ip ?? '' }}"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Phone No:<span class="text-danger">*</span></label>
                                                <input type="number" step="any" disabled class="form-control"
                                                    id="phone" placeholder="Phone no" value="{{ $user->phone ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">User Code:<span class="text-danger">*</span></label>
                                                <input type="number" step="any" name="user_code" class="form-control"
                                                    id="phone" placeholder="User code"
                                                    value="{{ $user->user_code ?? '' }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Designation:</label>
                                                <input type="text" name="designation" class="form-control"
                                                    id="phone" placeholder="Designation"
                                                    value="{{ $user->designation ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Password:</label>
                                                <input type="text" name="password" class="form-control" id="password"
                                                    placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Role:<span class="text-danger">*</span></label>
                                                <select name="role" class="form-control" id="role">
                                                    <option selected disabled>--Select Role--</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $user->role == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Company:<span class="text-danger">*</span></label>
                                                <select name="company_id" class="form-control" id="company_id">
                                                    <option selected disabled>--Select Company--</option>
                                                    @foreach ($company as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $user->company_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">New Image:</label>
                                                <input type="file" name="image" class="form-control"
                                                    id="image" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label class="">old Image:</label>
                                                <img src="{{ asset($user->image ?? '') }}" style="width:40px; height:40px;"
                                                    alt="">
                                            </div>
                                        </div>
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
