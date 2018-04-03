<h2> Hello , {{$user}} </h2>
<p>You can reset your password hare</p>
<p>Some more text</p> <br>
<a href="{{route('project.reset_password_view',['token' => $token,'user_id' => $user_id])}}"> Click here </a>to reset your password.
<br> <h4> Regards</h4><br><h5>dev.durgesh.laravel</h5>
