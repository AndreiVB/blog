 <?php
 if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
   if(is_array($_SESSION['error'])) {
     foreach($_SESSION['error'] as $error ) {
       echo $error;
     }

   }  
   
 } 
 ?>