<div class="sidebar-menu toggle-others fixed">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="{{ url('/') }}" class="logo-expanded">
                    <img src="{{ asset('assets/images/logo@2x.png') }}" width="80" alt=""/>
                </a>

                <a href="{{ url('/') }}" class="logo-collapsed">
                    <img src="{{ asset('assets/images/logo-collapsed@2x.png') }}" width="40" alt=""/>
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
        
        <?php //echo $my_nav_menu; ?>
        <?php $main_menus = \App\Models\Menu::where('parent_menu', '=', NULL)->get(); ?>
        <ul id="main-menu" class="main-menu">
        @foreach($main_menus as $menu)
            <li class="{{ strtolower($menu->title) == strtolower(session('main_menu')) ? 'active opened active' : '' }}">
                <a href="{{ $menu->menu_url ? $menu->menu_url : '#' }}">
                    <i class="{{ $menu->menu_icon }}"></i>
                    <span class="title">{{ $menu->title }}</span>
                </a>
                <?php $sub_menu1 = \App\Models\Menu::where('parent_menu', '=', $menu->id); ?>
                @if($sub_menu1->count())
                <ul>
                    @foreach($sub_menu1->get() as $sub1)
                        <li class="{{ strtolower($sub1->title) == strtolower(session('sub_menu')) ? 'active' : '' }}">
                            <a href="{{ $sub1->menu_url }}">
                                <span class="title">{{ $sub1->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
            </li>
        @endforeach
        </ul>

    </div>

</div>
