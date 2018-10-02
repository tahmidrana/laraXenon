<div class="sidebar-menu toggle-others fixed">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="{{ url('/') }}" class="logo-expanded">
                    <img src="assets/images/logo@2x.png" width="80" alt=""/>
                </a>

                <a href="{{ url('/') }}" class="logo-collapsed">
                    <img src="assets/images/logo-collapsed@2x.png" width="40" alt=""/>
                </a>
            </div>

            <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
            <div class="mobile-menu-toggle visible-xs">
                <a href="#" data-toggle="user-info-menu">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-success">7</span>
                </a>

                <a href="#" data-toggle="mobile-menu">
                    <i class="fa-bars"></i>
                </a>
            </div>

            <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
            <div class="settings-icon">
                <a href="#" data-toggle="settings-pane" data-animate="true">
                    <i class="linecons-cog"></i>
                </a>
            </div>


        </header>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="active opened active">
                <a href="#">
                    <i class="linecons-cog"></i>
                    <span class="title">Admin Console</span>
                </a>
                <ul>
                    <li class="active">
                        <a href="{{ url('/menu') }}">
                            <span class="title">Menu</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/role') }}">
                            <span class="title">Role</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>

</div>
