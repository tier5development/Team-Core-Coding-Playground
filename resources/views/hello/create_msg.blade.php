<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="{{url('/index')}}">INDEX</a>
<a href="{{url('/ticket')}}">TICKET</a>
<a href="{{url('/viewticket')}}">VIEW TICKET</a>
<a href="{{'/search_contact_no'}}">VIEW CONTACT</a>

<form action="/formsubmit">
	Username : <input type="text" name="username"><br>
	Email : <input type="email" name="email"><br>
    <input type="submit" name="submit">
</form>
if ($errors->any())
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