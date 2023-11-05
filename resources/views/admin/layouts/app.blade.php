<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <router-link to="/admin/dashboard" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard</span>
            </router-link>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" active-class="active" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Employee
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/create-employe" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Employee</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/list-employee" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Employee list</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" active-class="active" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Supplier
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/create-supplier" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Supplier</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/list-supplier" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Supplier list</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" active-class="active" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/create-category" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Category</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/list-category" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category list</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" active-class="active" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/create-product" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Product</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/list-product" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product list</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" active-class="active" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Expanse
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/create-expanse" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Expanse</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/list-expanse" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expanse list</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" active-class="active" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Employee Salary
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/list-salary" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Salary</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/all-salary" class="nav-link" active-class="active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Salary list</p>
                                    </router-link>
                                 </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/appointments" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Appointments
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/admin/setting" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Settings
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/admin/profile" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Profile
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" active-class="active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper bg-dark">
            <router-view></router-view>
        </div>


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
 
</body>

</html>
