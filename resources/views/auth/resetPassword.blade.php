<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Reset your Password</h1>
<form  action="/resetP" method="POST">
	 {{csrf_field() }}


<!-- Email : <input type="email" name="email"><br> -->

<input type="hidden" class="form-control" name="token" value='{{$token}}' required>
<input type="hidden" class="form-control" name="user_id" value='{{$user_id}}' required>



Password : <input type="password" name="password"><br>
Retype Password : <input type="password" name="password1"><br>

<input type="submit" name="submit" value="submit">

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