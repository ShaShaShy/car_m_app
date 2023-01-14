
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>

        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/landing.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap" rel="stylesheet">
</head>
<body>
<br><br>

<div class="entireForm">

<div class="myForm">
<form method="POST" action="{{ route('register') }}">
@csrf
<div class="input-group">
    <label class="label">Fullname</label>
    <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div></div></div><br>


<div class="input-group">
    <label class="label">Email address</label>
    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div></div></div><br>

<div class="input-group">
    <label class="label">Password</label>
    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div></div></div><br>

<div class="input-group">
    <label class="label">Re-enter Password</label>
    <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
    <div></div></div><br>

    <button type="submit" class="btn btn-primary submitbtn">
        {{ __('Register') }}
    </button>
    </form>
    </div><br>


<h1>Sign up now and Rent <br>The car of your dreams!</h1>

<p>
With many rental companies, you must be at least 21 years of age to rent a car, and any driver under 25 may have to pay a Young Driver Fee. Similarly, people aged 70+ may find some companies will charge a Senior Driver Fee, or may not rent to them at all.<Br><br>
So car rental for the under-25s or over-70s can be more expensive – which is one more reason to book with Rentalcars.com, as we work with all the big brands. Just check each car’s terms and conditions to see if your age would make any difference.


As the world’s biggest online car rental service, we specialize in finding the cheapest car rental deals from major brands such as Hertz, Avis, Alamo, and Budget. Daily, weekly, or monthly car rentals. just fill in our search form to compare deals from different companies – and find out how much you can save when you rent a car from us.<Br><Br>

One-way car rental deals are quite common, as they give people even more freedom to explore and enjoy their rental. However, rental companies will often charge a One Way Fee (or ‘drop charge’) to cover the cost of returning the car to its original location. As the world’s biggest online car rental service, we can help you find a one-way rental car with a low Fee – or no Fee at all.</p>

</div>
</body>
</html>
