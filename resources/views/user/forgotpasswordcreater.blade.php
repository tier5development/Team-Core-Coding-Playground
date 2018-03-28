<html>
<head>
<title> Register </title>
</head>

<body>

<hr>
<form method="POST" action="/newpass" id="registration">
  {{csrf_field() }}
        <div class="form-group">
            <label for="email">Email id</label>
            <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="Passwordc">Re type New Password</label>
            <input type="password" class="form-control" name="passwordc" id="passwordc"  placeholder="Conform Password"  required>
        </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        <li>Errors</li>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>

</html>
