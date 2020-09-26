@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">{{ __('ADD PRODUCT DETAILS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mx-auto">
                        <form action="{{ url('/product/details/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="floating-label-form-group">
                                <label>Choose Product Type</label>
                                <br>
                                <select class="form-control text-size" id="type" name="type">
                                    <option>Select</option>
                                    @foreach ($productstypes as $row)
                                    <option value="{{ $row->id }}">{{ $row->producttype }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="name" class="form-control" placeholder="Enter Product Name" name="name">
                            </div>


                            <div class="form-group">
                                <input type="name" class="form-control" placeholder="Enter Product brand" name="brand">
                            </div>


                            <div class="form-group">

                                <input type="name" class="form-control" placeholder="Enter Product model" name="model">
                            </div>


                            <div class="form-group">

                                <input type="name" class="form-control" placeholder="Product Used" name="used">
                            </div>


                            <div class="form-group">

                                <input type="name" class="form-control" placeholder="Product price" name="price">
                            </div>




                            <div class="form-group">
                                <textarea name="details" id="details" rows="3" class="form-control form-control-lg text-size" placeholder="Enter Products Details Here"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Add product Image</label> <small>(File required maximum 5mb)</small>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm btn-block">Add Product Details</button>
                            <!-- /.card-body -->

                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
