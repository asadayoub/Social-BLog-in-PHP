<?php


function isSession() {
    if($_SESSION["email"]!=null && $_SESSION["pass"]!=null){
      return true;
    }
    return false;
  }
  function destroySession(){
    session_destroy();
    header('Location: login.php');
  }
?>