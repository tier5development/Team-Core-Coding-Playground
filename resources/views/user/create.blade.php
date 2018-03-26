
<html>
<head>
<title> Register </title>
<head>

<body>

<hr>
<form method="POST" action="/nuser" id="registration">
  {{csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter name" required>
    <label for="name">Last name</label>
    <input type="text" class="form-control" name="lname" aria-describedby="lname" placeholder="Enter last name" required>
  </div>
  <div class="form-group">
    <label for="email">Email id</label>
    <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="Passwordc">Re type Password</label>
    <input type="password" class="form-control" name="passwordc" id="passwordc"  placeholder="Conform Password"  required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
  $(function() {
    $("#registration").validate({
      rules: {
      
        name: "required",
        lname: "required",
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 8,
          equalTo : "#passwordc"
        }

      },
      // Specify validation error messages
      messages: {
        name: "Please enter your firstname",
        lname: "Please enter your lastname",
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long",
          equalTo : "Please check your confirm  password"
        },
        email: "Please enter a valid email address"
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>

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
