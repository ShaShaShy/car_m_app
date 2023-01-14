<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<link rel="stylesheet" type="text/css" href="/css/styles.css">
		<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4 shadow fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Car Rental System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addCarModal">Add Vehicle</a>
        </li>

      </ul>
      <span class="navbar-text">
      @if (Route::has('login'))
            @auth
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       {{ ucfirst(Auth::user()->name) }}
    </a>

    <div class="dropdown-menu dropdown-menu-end bg-dark text-dark" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
                </div>
             @endauth
        @endif
      </span>
    </div>
  </div>
</nav>

<div class="sidebar bg-dark text-center">
  <a href="#" data-bs-toggle="modal" data-bs-target="#rentedModal"><i class="fa fa-history" style="font-size:18px; color:whitesmoke;"></i> &nbsp;Rented Cars</a>
  <a href="#" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="fa fa-history" style="font-size:18px; color:whitesmoke;"></i> &nbsp;Transactions</a>
  <a href="#contact"><i class="fa fa-handshake-o" style="font-size:18px; color:whitesmoke;"></i> &nbsp;User Inquery</a>
</div>
<br><br>
<br><br>
<div class="content">

@foreach($carData as $data)
<div class="card">
<div class="card-img"></div>
  <div class="card-info">
    <div class="card-text">
      <a  data-bs-toggle="modal" href="#carInfoModal{{ $data->id }}" role="button"><p class="text-title">{{ $data->car_name }}</p>
      <img src="{{ url('uploads/'.$data->img_path) }}" style="width:300px; margin: 0 auto; display:block;">
      <p class="text-subtitle">{{ $data->car_desc }}</p></a>
    </div>
  </div>
</div>


<div class="modal fade" id="carInfoModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $data->car_name }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    <div class="forRent">
    <img src="{{ url('uploads/'.$data->img_path) }}" style="width:450px; display:block; margin: 0 auto;">
    <p class="text-subtitle text-center">{{ $data->car_desc }}
    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco 
      laboris nisi ut aliquip ex ea commodo consequa
    </p>
    </div>  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark">Rent Car</button>
      </div>
    </div>
  </div>
</div>
@endforeach


</div>


<!-- Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Vehicle for Rent</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="POST" action="{{ route('saveCar') }}" enctype="multipart/form-data">
{{ csrf_field() }}          
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Car Name</label>
  <input type="text" name="c_name" class="form-control" id="exampleFormControlInput1" placeholder="BMW M3 Touring"><br>

  <label for="exampleFormControlInput1" class="form-label">Rent Price</label>
  <input type="text" name="c_rent" class="form-control" id="exampleFormControlInput1" placeholder="$1500"><br>

<div class="mb-3">
  <label for="formFile" class="form-label">Car Picture</label>
  <input class="form-control" name="image" type="file" id="formFile">
</div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" name="c_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Info</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">List of Transaction and Payments</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <table class="table">
      <thead>
      <th scope="col">My Name</th>
      <th scope="col">Car Name</th>
      <th scope="col">Rent</th>
      <th scope="col">Rent Date</th>
      <th scope="col">Due Date</th>
      <th scope="col">Status</th>
      @foreach ($userRents as $data)
    <tr>   
      <td>{{ $data -> client_name }}</td>
      <td>{{ $data -> car_name }}</td>
      <td>{{ $data -> rent }}</td>
      <td>{{ $data -> rent_date }}</td>
      <td>{{ $data -> due_date }}</td>
      <td style="color:red; font-weight:bold;">PAID</td>
    </tr>

  @endforeach
      </tbody>
  </table>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="rentedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Frequently Rented Cars</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <table class="table text-center">
      <thead>
      
      <th scope="col">Car Name</th>
      <th scope="col">Last Rented</th>
      @foreach ($userRents as $data)
    <tr>   
      <td>{{ $data -> car_name }}</td>
      <td>{{ $data -> rent_date }}</td>
    </tr>

  @endforeach
      </tbody>
  </table>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>