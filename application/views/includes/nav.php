<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>inicio"><?= ucfirst($this->session->userdata('company')) ?></a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <i id="notify" style=" " class="fa fa-bell-o fa-lg">
                <span style="display:none" class="fa fa-comment"></span>
                <span style="display:none;" class="num">0</span>
                </i>
            </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">Tienes <div style="display: inline;" id="numm">0</div> notificaciones nuevas.</li>
                <div class="app-notification__content">


                </div>
                <li class="app-notification__footer"><a href="#">Ver todas las notificaciones</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="<?= base_url() ?>btndirectos/salir"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a></li>
            </ul>
        </li>
    </ul>
</header>