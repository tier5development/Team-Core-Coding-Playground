<?php
ini_set("display_error", 1);
error_reporting(E_ALL);
   class Books {
      /* Member variables */
      var $price;
      
      
      
      function setPrice($par){
         $this->price = $par;
         echo $par;
      }
      
      function getPrice(){
         echo $this->price ."<br/>";
      }
      
      
      }
     /* $physics = new Books;*/
/*$maths = new Books;
$chemistry = new Books;
$physics->setTitle( "Physics for High School" );
$chemistry->setTitle( "Advanced Chemistry" );
$maths->setTitle( "Algebra" );

$physics->setPrice( 10 );
$chemistry->setPrice( 15 );
$maths->setPrice( 7 );*/
$physics = new Books();
$maths = new Books();
$chemistry = new Books();


$physics->setPrice( 10 );
$chemistry->setPrice( 15 );
$maths->setPrice( 7 );
?>