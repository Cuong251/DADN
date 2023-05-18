<div class="wrapper">
    <nav class="sidebar close" id="mySideBar">
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
            <div id="btn-sideBar">
                <a href="javascript:void(0)" class='bx bx-chevron-right toggle' onclick="OpenOrClose()"></a>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">


                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="/DADN/UI/PHP/housestate.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home Manager</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/DADN/IO_connect/realtime_display.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Statistics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#viewDevices" onclick="showIotItem()">
                            <i class='bx bx-slider-alt icon'></i>
                            <span class="text nav-text">IoT Manager</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#viewUserProfile" onclick="showUserProfile()">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">User Profile</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
</div>
<!-- https://bootstrapious.com/p/bootstrap-sidebar  -->