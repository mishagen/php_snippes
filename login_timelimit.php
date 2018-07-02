<?php
  
session_start();

function out(){        // destroy active session

  session_unset();     // unset $_SESSION 
  session_destroy();   // destroy session 
  session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
  
}

      // if the last access exceeds 1800 seconds
      if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            out();
      }

      if(isset($_GET['exit'])){
            out();
      }

      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

      if(!isset($_SESSION['login'])){
          header('Location: login.php');
      } 

 /* 
 if(!last_login($_SESSION['login'])){
    header('Location: login.html');
 }
*/
  
?>
