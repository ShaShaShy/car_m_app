<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
    Car Rental System
  </title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
		<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

  <style>

  </style>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4 shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Car Rental System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if (Route::has('login'))
            @auth
            <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link">Home</a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Log in</a>
            </li>

            @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
            @endif
            @endauth
        @endif
      
        @if (Route::has('login'))
            @auth
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" href="#transactionModal">My Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rented Cars</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">My Cart</a>
        </li>
        @else
        @endauth
        @endif
      </ul>
      <span class="navbar-text">
      @if (Route::has('login'))
            @auth
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-end bg-dark text-dark" aria-labelledby="navbarDropdown">
      <a class="dropdown-item bg-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
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

<div class="intro-1">
<h1>Shane's Renting</h1>
<h2>Better car with great rates</h2>

</div>

@foreach($carData as $data)

<div class="card ">
<div class="card-img"></div>
  <div class="card-info">
    <div class="card-text">
      <a  data-bs-toggle="modal" href="#carInfoModal{{ $data->id }}" role="button"><p class="text-title">{{ $data->car_name }}</p>
      <img src="{{ url('uploads/'.$data->img_path) }}" style="width:350px; margin: 0 auto; display:block;">
      <p class="text-subtitle ">{{ $data->car_desc }}
      </p></a>
    </div>
    <div class="card-icon">
      <svg viewBox="0 0 28 25">
        <path d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"></path>
      </svg>
    </div>
  </div>
</div>

<div class="modal fade" id="carInfoModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $data->car_name }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5 class="text-center">Rate Car</h5>
      <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
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
      @if (Route::has('login'))
       @auth
       <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#cartModal">Add to Cart</button>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#rentModal">Rent Car</button>
        @else
        <a href="{{ route('login') }}" ><button type="button" class="btn btn-dark">Rent Car</button></a>
       @endauth
      @endif
      </div>
    </div>
  </div>
</div>



@endforeach

@if (Route::has('login'))
  @auth

  <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Transaction History</h1>
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
      @foreach ($userRents as $data)
    <tr>   
      <td>{{ $data -> client_name }}</td>
      <td>{{ $data -> car_name }}</td>
      <td>{{ $data -> rent }}</td>
      <td>{{ $data -> rent_date }}</td>
      <td>{{ $data -> due_date }}</td>
    </tr>

  @endforeach
      </tbody>
  </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--CART MODAL -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Cart</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Rent All</button>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Application Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="POST" action="{{ route('saveRent') }}" >
{{ csrf_field() }}          
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Client Name</label>
  <input type="text" name="cli_name" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->name }}" ><br>

  <label for="exampleFormControlInput1" class="form-label">Car Name</label>
  <select class="form-select" name="car_name" id="dropdown" onchange="javascript:selectChanged();">
    @foreach($carData as $data)
    <option data-price="{{ $data->car_rent }}" value="{{ $data->car_name }}">{{ $data->car_name }}</option>
    @endforeach
  </select><br>

  <label for="exampleFormControlInput1" class="form-label">Rent Price per week</label>
  <input type="text" id="data-price" name="rent" class="form-control" ><br>

  <label for="exampleFormControlInput1" class="form-label">Date today</label>
  <input type="text" name="date" class="form-control" id="exampleFormControlInput1" value="{{ date('d-m-Y'); }}"><br>

  <label for="exampleFormControlInput1" class="form-label">Choose date</label>
  <input type="date" name="due_date" class="form-control" id="exampleFormControlInput1" ><br>


  <input id="checkbox" type="checkbox"/>
  <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send Application</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endauth
        @endif




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <script type="text/javascript">
    function selectChanged () 
    { 
    var obj = document.getElementById("dropdown");
    var courseTitle = document.getElementById("data-price");
    courseTitle.value = obj.options[obj.selectedIndex].getAttribute('data-price', 2);
    }
</script>

</body>
</html>