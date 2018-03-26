<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="\" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PROFILE</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="\about" class="w3-bar-item w3-button">ABOUT</a>
        <a href="\login" class="w3-bar-item w3-button">LOGIN</a>
        <a href="register" class="w3-bar-item w3-button">REGISTER</a>
        <a href="post" class="w3-bar-item w3-button">POST</a>
      </div>
    </div>
  </div>
</div>
<center>
  @yield('content')
<footer class="page-footer">
       <div class="footer-copyright">

         <div class="container">
              <a class="grey-text text-lighten-4 right" href="about"> dev.durgesh.laravel</a>
         </div>
       </div>
</footer>
</center>
</body>
</html>
