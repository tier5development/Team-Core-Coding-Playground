<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>

<div class="container"><br>
<form action="/insert" method="POST">

{{csrf_field()}}

<div class="form-group">
    <label>Email :</label>
    <input type="text" name="email" class="form-control" id="email">
    <span id="emailn" class="text-danger" font-weight-bold></span>
</div>



<div class="form-group">
    <label>Password :</label>
    <input type="password" name="pass" class="form-control" id="pass">
    <span id="password" class="text-danger" font-weight-bold></span>
</div>

<div class="form-group">
    <label>Confirm Password :</label>
    <input type="password" name="conpass" class="form-control" id="conpass">
    <span id="confirmpsw" class="text-danger" font-weight-bold></span>
</div>

<div class="form-group">
    <label>Mobile Number :</label>
    <input type="text" name="mobile" class="form-control" id="mobile">
    <span id="mobnum" class="text-danger" font-weight-bold></span>
</div>



<input type="submit" name="submit" value="submit">
</form>



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




</body>
</html>