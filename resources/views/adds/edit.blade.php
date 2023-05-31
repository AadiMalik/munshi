@extends('layouts.app')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit/</span> Adds</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Update Adds</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('adds.update', $add->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="">New Image:</label>
                                        <input type="file" name="image" class="form-control" id="image" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="">Old Image:</label>
                                        <img src="{{asset($add->image??'')}}" style="width:60px; hieght:60px;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label class="">Description:</label>
                                        <textarea name="description" class="form-control" id="description" placeholder="Adds Description.." cols="30" rows="10">{{$add->description??''}}</textarea>
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
