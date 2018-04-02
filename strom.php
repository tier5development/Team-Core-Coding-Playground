
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<script>
      // Code copied from Facebook to load and initialise Messenger extensions
      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.com/en_US/messenger.Extensions.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'Messenger'));
 </script>

<form method="post" id="enter name form" action="webviewjson.php">

<input type="hidden" name="action" value="webview">
First name:<input type="text" name="fname">
<br><br>
Last name: <input type="text" name="lname">
<br><br>
<input type="submit" name="submit" value="Submit">  
</form>



<!-- <script src="https://code.jquery.com/jquery-2.2.1.min.js"
            integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00="
            crossorigin="anonymous"></script> -->
   <!--  <script>
      window.extAsyncInit = function() {
        console.log('Messenger extensions are ready');
        
        // Handle button click
        $('#enterNameForm').submit(function(event) {
          console.log('Submit pressed');
          
          event.preventDefault();
          
          const formData = $('#enterNameForm').serialize();
          $.post('/post-back-to-chatfuel', formData, function (data) {
            MessengerExtensions.requestCloseBrowser(function () {
              console.log('Window will be closed');
            }, function (error) {
              console.log('There is an error');
              console.log(error);
            });
          });
        });
        
      }
    </script> -->


<?php
echo $fname." ".$lname;
?>




 </body>
</html>
