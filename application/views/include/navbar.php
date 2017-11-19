<?php
$user = $this->usermanager->get_me();
?>
<?php if (!isset($no_loader)) { ?>
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
<?php } ?>

<div class="overlay"></div>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url(''); ?>">LIBRARY MANAGE</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo base_url('manage/auth/logout'); ?>" role="button">
                        <i class="material-icons">input</i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section class="mysidebar">
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url('assets/adminbsb/images/user.png'); ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user->name; ?></div>
                <div class="email"><?php echo $user->email; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo base_url('manage/auth/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <?php
        $url = explode('/', current_url());
        ?>
        <!-- Menu -->
        <div class="menu" style="padding-bottom: 100px;">
            <ul class="list"style="
                padding-bottom: 100px;
                margin-bottom: 100px;
                ">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo (strcmp($url[count($url) - 1], 'manage') == 0 ) ? 'active' : '' ?>">
                    <a href="<?php echo base_url('manage/'); ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="<?php echo in_array('users', $url) ? 'active' : '' ?>">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">dns</i>
                        <span>User Management</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="<?php echo base_url('users'); ?>" class="waves-effect waves-block">All Users</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('users/add'); ?>" class="waves-effect waves-block">Add User</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('manage/stocks/expired_stocks'); ?>" class="waves-effect waves-block">Expired Stocks</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('manage/stocks/returns'); ?>" class="waves-effect waves-block">Returns</a>
                        </li>
                    </ul>
                </li>                



            </ul>
        </div>
    </aside>
</section>