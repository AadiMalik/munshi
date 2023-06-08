@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add/</span> Company</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Create Company</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Company Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Company name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Company Address:<span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Company address" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Logo:<span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control" id="image" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">CEO:<span class="text-danger">*</span></label>
                                        <input type="text" name="ceo" class="form-control" id="ceo" placeholder="Company ceo" required />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone1:</label>
                                        <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Phone1" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone2:</label>
                                        <input type="text" name="phone2" class="form-control" id="phone2" placeholder="Phone2" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone3:</label>
                                        <input type="text" name="phone3" class="form-control" id="phone3" placeholder="Phone3" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label class="">Phone4:</label>
                                        <input type="text" name="phone4" class="form-control" id="phone4" placeholder="Phone4" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Munshi:</label>
                                        <input type="text" name="munshi" class="form-control" id="munshi" placeholder="Munshi name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label class="">Munshi Phone:</label>
                                        <input type="text" name="munshi_phone" class="form-control" id="munshi_phone" placeholder="Munshi phone" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
