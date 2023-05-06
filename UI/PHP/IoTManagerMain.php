<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/DADN/UI/CSS/Sidebar.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.css"><link rel="stylesheet">
    
    <title>Tre Việt</title> 
</head>
<body>

<?php
            include "$_SERVER[DOCUMENT_ROOT]/DADN/UI/PHP/header.php";
            include "$_SERVER[DOCUMENT_ROOT]/DADN/UI/PHP/Sidebar.php";
            include_once "$_SERVER[DOCUMENT_ROOT]/DADN/UI/config/dbconnect.php";
        ?>
 <div id="main-content" class="container allContent-section py-4">


    </div>
  <script type="text/javascript" src="/DADN/js/Sidebar.js" ></script>    
  <script type="text/javascript" src="/DADN/js/ajaxWorks.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"  ></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"  ></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
</body>
</html>
<!-- <script>
      const body = document.querySelector('body'),
      const sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})
    </script> -->
<!-- <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="/DADN/UI/Imgs/logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">SmartHome</span>
                    <span class="profession"></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Home Manager</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Statistics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-slider-alt icon'></i>
                            <span class="text nav-text">IoT Manager</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">User Profile</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                
            </div>
        </div>
 -->
