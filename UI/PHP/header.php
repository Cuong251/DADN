<?php
   session_start();
   include_once "$_SERVER[DOCUMENT_ROOT]/DADN/UI/config/dbconnect.php";

?>
    <link rel="stylesheet" href="/DADN/UI/CSS/Sidebar.css">     
 <!-- nav -->
 <header class="navbar navbar-light bg-light justify-content-end" style="background-color:var(--body-color);">
    
    <!-- As a heading -->
    <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>    
      </header>
