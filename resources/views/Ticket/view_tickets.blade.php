<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<center>
<a href="{{url('/ticket')}}">BOOK TICKET</a></center>
<br><br>
<div class="container">
 <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Sex</th>
        <th>Contact</th>
        <th>Email</th>
      </tr>
    </thead>
@foreach($ticket as $row)
<tr>
        <td>{{$row->name}}</td>
        <td>{{$row->sex}}</td>
        <td>{{$row->contact}}</td>
        <td>{{$row->email}}</td>
 </tr>
 @endforeach

</body>
</html>
