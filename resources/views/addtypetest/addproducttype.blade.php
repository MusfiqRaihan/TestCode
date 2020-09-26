@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">{{ __('ADD PRODUCT TYPE') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mx-auto">
                        <form action="{{ url('/product/type/store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Type</label><small>(Maximum 15 characters) </small>
                                <input type="name" class="form-control" placeholder="Enter Product Type" name="producttype">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Add Product Type</button>
                            <!-- /.card-body -->

                        </form>
                    </div>



<br><br>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ml-auto">
                      <h5>Product Type Lists</h5>
                        <table class="table table-responsive">
                            <tr>
                                <th>SL</th>
                                <th>Product Type</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($productstypes as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->producttype }}</td>
                                <td>
                                    <a href="{{ URL::to('/product/type/delete/'.$row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </table>


                        {{ $productstypes->links() }}

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
