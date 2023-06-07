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
                        <hr class="mb-0">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <b style="font-size:18px; color:#696cff;">Company Admin:</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="border:2px solid #DC143C;background: #f8bf9e; padding:10px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Company Name:<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="company" class="form-control" id="phone"
                                                    placeholder="Company" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Unit Name:<span class="text-danger">*</span></label>
                                                <input type="text" name="unit_name" class="form-control"
                                                    id="unit_name" placeholder="Unit Name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">IP:<span class="text-danger">*</span></label>
                                                <input type="text" step="any" name="user_ip" class="form-control"
                                                    id="user_ip" placeholder="User IP" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Phone No:<span class="text-danger">*</span></label>
                                                <input type="number" step="any" name="phone" class="form-control"
                                                    id="phone" placeholder="Phone no" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">User Code:<span class="text-danger">*</span></label>
                                                <input type="number" step="any" name="user_code" class="form-control"
                                                    id="phone" placeholder="User code" required />
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">1st User Phone:<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" step="any" name="user_phone1" class="form-control"
                                                    id="phone" placeholder="First user phone" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">1st User Name:<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" step="any" name="user_name1" class="form-control"
                                                    id="phone" placeholder="First user name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">1st User Designation:<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="user_designation1" class="form-control"
                                                    id="phone" placeholder="First user designation" required />
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Password:<span class="text-danger">*</span></label>
                                                <input type="text" name="password" value="abc123" class="form-control"
                                                    id="password" placeholder="Password" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Role:<span class="text-danger">*</span></label>
                                                <select name="role" class="form-control" id="role">
                                                    <option selected disabled>--Select Role--</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Image/Logo:<span class="text-danger">*</span></label>
                                                <input type="file" name="image" class="form-control" id="image"
                                                    required />
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <b style="font-size:18px; color:#696cff;">Worker:</b>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12"
                                    style="border:2px solid #32CD32;background: #9ef8aa; padding:10px;">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Worker Code:<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" step="any" name="worker_code[]"
                                                    class="form-control" id="worker_code"
                                                    placeholder="worker code" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">IP:<span class="text-danger">*</span></label>
                                                <input type="text" step="any" name="worker_ip[]" class="form-control"
                                                    id="worker_ip" placeholder="Worker IP" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Worker Phone:<span class="text-danger">*</span></label>
                                                <input type="number" step="any" name="worker_phone[]"
                                                    class="form-control" id="worker_phone"
                                                    placeholder="Worker phone" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Worker Password:<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="worker_password[]" value="abc123"
                                                    class="form-control" id="worker_password" placeholder="Worker Password"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Role:<span class="text-danger">*</span></label>
                                                <select name="worker_role[]" class="form-control" id="worker_role">
                                                    <option selected disabled>--Select Worker Role--</option>
                                                    @foreach ($roles->where('id','!=',1) as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Worker Name:<span class="text-danger">*</span></label>
                                                <input type="text" step="any" name="worker_name[]"
                                                    class="form-control" id="worker_name" placeholder="Worker name" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label class="">Worker Designation:<span class="text-danger">*</span></label>
                                                <input type="text" step="any" name="worker_designation[]"
                                                    class="form-control" id="worker_designation"
                                                    placeholder="Worker designation" required />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> --}}
                            <div id="newRow"></div>
                            <button class="btn btn-primary mt-1" id="addRow" type="button">Add</button>
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
@section('script')
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html +='<div class="row mt-2" id="inputFormRow">';
        html +='<div class="col-md-12" style="border:2px solid #32CD32;background: #9ef8aa; padding:10px;">';
        html +='<div class="row">';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label>Worker Code:<span class="text-danger">*</span></label>';
        html +='<input type="number" step="any" name="worker_code[]" class="form-control" id="worker_code" placeholder="worker code" required />';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label class="">IP:<span class="text-danger">*</span></label>';
        html +='<input type="text" step="any" name="worker_ip[]" class="form-control" id="worker_ip" placeholder="Worker IP" required />';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label class="">Worker Phone:<span class="text-danger">*</span></label>';
        html +='<input type="number" step="any" name="worker_phone[]" class="form-control" id="worker_phone" placeholder="Worker phone" required />';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label class="">Worker Password:<span class="text-danger">*</span></label>';
        html +='<input type="text" name="worker_password[]" value="abc123" class="form-control" id="worker_password" placeholder="Worker Password" required />';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label class="">Role:<span class="text-danger">*</span></label>';
        html +='<select name="worker_role[]" class="form-control" id="worker_role">';
        html +='<option selected disabled>--Select Worker Role--</option>';
        html +='@foreach ($roles->where("id","!=",1) as $item)';
        html +='<option value="{{ $item->id }}">{{ $item->name ?? "" }}</option>';
        html +='@endforeach';
        html +='</select>';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label class="">Worker Name:<span class="text-danger">*</span></label>';
        html +='<input type="text" step="any" name="worker_name[]" class="form-control" id="worker_name" placeholder="Worker name" required/>';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html +='<label class="">Worker Designation:<span class="text-danger">*</span></label>';
        html +='<input type="text" step="any" name="worker_designation[]" class="form-control" id="worker_designation" placeholder="Worker designation" required />';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-2">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        // html += '<div id="inputFormRow">';
        // html += '<div class="input-group mb-3">';
        // html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
        // html += '<div class="input-group-append">';
        
        // html += '</div>';
        // html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>
@endsection
