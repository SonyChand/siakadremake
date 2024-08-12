<div class="wrapper">
    <!-- Sidebar -->
    <?php

    if ($user->image == 'default') {
        if ($user->jenis_kelamin == 'L') {
            $fotoprofil = base_url('assets/img/user/default/') . 'L.jpg';
        } else {
            $fotoprofil = base_url('assets/img/user/default/') . 'P.jpg';
        }
    } else {
        $fotoprofil = base_url('assets/img/user/') . $user->image;
    }

    ?>
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="<?= base_url() ?>" class="logo text-white">
                    <!-- <img src="<?= base_url('assets/dash/assets/') ?>img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" /> -->
                    <span>SIAKAD</span>
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <?php
                    if ($user->role == 1) {
                        $nav = $this->db->order_by('order', 'ASC')->get_where('menu', [
                            'status' => 1
                        ])->result_array();
                    } elseif ($user->role == 2) {
                        $nav = $this->db->order_by('order', 'ASC')->get_where('menu', [
                            'status' => 1,
                            'for >=' => $user->role
                        ])->result_array();
                    } else {
                        $nav = $this->db->order_by('order', 'ASC')->get_where('menu', [
                            'status' => 1,
                            'for' => 3
                        ])->result_array();
                    }
                    ?>
                    <!-- Nav Item - Dashboard -->
                    <?php foreach ($nav as $n) : ?>
                        <?php $submenu = $this->db->get_where('submenu', ['status' => 1, 'menu_id' => $n['id']]); ?>
                        <?php if ($submenu->num_rows() == 0) : ?>
                            <?php if ($title == $n['menu']) : ?>

                                <li class="nav-item active">
                                    <a href="<?= base_url() . $n['link']; ?>">
                                        <i class="bi <?= $n['icon']; ?>"></i>

                                    <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url() . $n['link']; ?>">
                                        <i class="bi <?= $n['icon']; ?>"></i>
                                    <?php endif; ?>
                                    <p><?= $n['menu']; ?></p>
                                    </a>
                                <?php else : ?>


                                <li class="nav-item">
                                    <a data-bs-toggle="collapse" href="#menu<?= $n['id']; ?>" class="collapsed" aria-expanded="false">
                                        <i class="fa <?= $n['icon']; ?>"></i>
                                        <span><?= $n['menu']; ?></span>
                                        <span class="caret"></span>
                                    </a>

                                    <div id="menu<?= $n['id']; ?>" class="collapse">
                                        <ul class="nav nav-collapse">

                                            <?php foreach ($submenu->result_array() as $s) : ?>
                                                <?php if ($this->uri->segment(2) == $s['url_ii']) : ?>
                                                    <li class="active">
                                                        <a href="<?= base_url($s['url_i'] . $s['url_ii']); ?>">
                                                            <span class=" sub-item"><?= $s['title']; ?></span>
                                                        </a>
                                                    <?php else : ?>
                                                    <li>
                                                        <a href="<?= base_url($s['url_i'] . $s['url_ii']); ?>">
                                                            <span class="sub-item"><?= $s['title']; ?></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    </li>

                                                <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="<?= base_url('assets/dash/assets/') ?>img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                        <li class="nav-item topbar-icon dropdown hidden-caret">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="notifDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul
                                class="dropdown-menu notif-box animated fadeIn"
                                aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">
                                        You have 4 new notification
                                    </div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary">
                                                    <i class="fa fa-user-plus"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block"> New user registered </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-success">
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img
                                                        src="assets/img/profile2.jpg"
                                                        alt="Img Profile" />
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger">
                                                    <i class="fa fa-heart"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block"> Farrah liked Admin </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item topbar-user dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="<?= $fotoprofil ?>" alt="..." class="avatar-img rounded-circle" />
                                </div>
                                <span class="profile-username">
                                    <span class="op-7">Hi,</span>
                                    <span class="fw-bold"><?= $user->nama ?></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="<?= $fotoprofil ?>" alt="image profile" class="avatar-img rounded" />
                                            </div>
                                            <div class="u-text">
                                                <h4><?= $user->nama ?></h4>
                                                <p class="text-muted"><?= sumput($user->email) ?></p>
                                                <a href="<?= base_url('profil') ?>" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url('profil') ?>">My Profile</a>
                                        <a class="dropdown-item" href="<?= base_url('profil') ?>">Change Password</a>
                                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>