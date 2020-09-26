<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <title>Bechakena - Online Store</title>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bechakena</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      @if (Route::has('login'))
              @auth
                <li class="nav-item active">
                <a href="{{ url('/home') }}" class="nav-link" >Home</a>
                </li>
              @else
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link" >Login</a>
                </li>
                  @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link" >Register</a>
                    </li>

                  @endif
              @endif
      @endif
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{ url('/product/details/search') }}" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Product Type" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

      <table class="table table-responsive">

        <tr>
          <th>SL</th>
          <th>Product Type</th>
          <th>Product Name</th>
          <th>Product Brand</th>
          <th>Product Model</th>
          <th>Product Used</th>
          <th>Product Price</th>
          <th>Product Details</th>
          <th>Product Image</th>
          <th>Action</th>
        </tr>

    @foreach ($productsdetails as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->producttype }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->brand}}</td>
          <td>{{ $row->model }}</td>
          <td>{{ $row->used }}</td>
          <td>{{ $row->price }}</td>
          <td>{{ $row->details }}</td>
          <td><img src="{{ URL::to($row->image) }}" style="width:70px; height:60px;" alt=""></td>
          <td>
            <a href="{{ url('/product/details/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>

        @endforeach

      </table>

{{ $productsdetails->links() }}



       </div>


  </body>
</html>
