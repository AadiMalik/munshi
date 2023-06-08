@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit/</span> Company</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Update Company</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Company Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{$company->name??''}}" class="form-control" id="name" placeholder="Company name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Company Address:<span class="text-danger">*</span></label>
                                        <input type="text" name="address" value="{{$company->address??''}}" class="form-control" id="address" placeholder="Company address" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">CEO:<span class="text-danger">*</span></label>
                                        <input type="text" name="ceo" value="{{$company->ceo??''}}" class="form-control" id="ceo" placeholder="Company ceo" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">New Logo:</label>
                                        <input type="file" name="image" class="form-control" id="image" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone1:</label>
                                        <input type="text" name="phone1" value="{{$company->phone1??''}}" class="form-control" id="phone1" placeholder="Phone1" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone2:</label>
                                        <input type="text" name="phone2" value="{{$company->phone2??''}}" class="form-control" id="phone2" placeholder="Phone2" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone3:</label>
                                        <input type="text" name="phone3" value="{{$company->phone3??''}}" class="form-control" id="phone3" placeholder="Phone3" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone4:</label>
                                        <input type="text" name="phone4" value="{{$company->phone4??''}}" class="form-control" id="phone4" placeholder="Phone4" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Munshi:</label>
                                        <input type="text" name="munshi" value="{{$company->munshi??''}}" class="form-control" id="munshi" placeholder="Munshi name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Munshi Phone:</label>
                                        <input type="text" name="munshi_phone" value="{{$company->munshi_phone??''}}" class="form-control" id="munshi_phone" placeholder="Munshi phone" />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Old Logo:</label>
                                        <img src="{{asset($company->logo??'')}}" style="width:60px; hieght:60px;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
