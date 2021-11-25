<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="utf-8" />
    <title>Syxavissa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Coderthemes" name="Edmetrio/Samuel" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{asset('./assets/images/capas.png')}}">

    <link href="{{asset('./assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('./assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('./assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('./assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('./assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('./assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('./assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('./assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <link href="{{asset('./assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    
</head>

<body class="loading">

    <div id="wrapper">

        <div class="left-side-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{asset('./assets/images/footer.png')}}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('./assets/images/footer.png')}}" alt="" height="22">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{asset('./assets/images/footer.png')}}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('./assets/images/footer.png')}}" alt="" height="22">
                    </span>
                </a>
            </div>

            <div class="h-100" data-simplebar>

                <div class="user-box text-center">
                    <img src="{{asset('./assets/images/users/Milton.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Milton Adelino</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i></i>
                                <span>Minha Conta</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i></i>
                                <span>Definições</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i></i>
                                <span>Alterar Palavra-Passe</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i></i>
                                <span>Sair</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Design</p>
                </div>

                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Primeiro Atalho</li>
                        <li>
                            <a href="#sidebarApps" data-toggle="collapse">
                                <i></i>
                                <span> Categorias </span>
                            </a>

                            <div class="collapse" id="sidebarApps">
                                <ul class="nav-second-level">
                                    <li><a href="{{url('categoria')}}">Categoria</a></li>
                                    <li><a href="{{url('subcategoria')}}">Subcategoria</a></li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarEmail" data-toggle="collapse">
                                <i></i>
                                <span> Artigos </span>
                                
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="nav-second-level">
                                    <li><a href="{{url('artigo')}}">Artigo</a></li>
                                    <!-- <li><a href="#">Composição</a></li>
                                    <li><a href="#">Unidade</a></li> -->
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Segundo Atalho</li>
                        <li>
                            <a href="#Segundo" data-toggle="collapse">
                                <i></i>
                                <span> Processamento </span>
                            </a>

                            <div class="collapse" id="Segundo">
                                <ul class="nav-second-level">
                                    <li><a href="{{url('stock')}}">Estoque</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title">Terceiro Atalho</li>
                    </ul>

                </div>

                <div class="clearfix"></div>

            </div>

        </div>


        <div class="content-page">

            <div class="navbar-custom">
                <div class="container-fluid">

                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="d-none d-lg-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Procurar..." id="top-search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>

                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i>Pesquisar</i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Procurar ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('./assets/images/users/Milton.jpg')}}" alt="imagem" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    Milton Adelino <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bem-Vindo !</h6>
                                </div>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i></i>
                                    <span>Minha Conta</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i></i>
                                    <span>Definições</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i></i>
                                    <span>Alterar Palavra-Passe <span class="badge badge-success float-right"></span> </span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i></i>
                                    <span>Sair</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i></i>
                                <span>Definições</span>
                            </a>
                        </li>

                    </ul>

                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="../assets/images/logo-sm.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/logo-dark.png" alt="" height="22">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="./assets/images/logo-sm.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="./assets/images/logo-light.png" alt="" height="22">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i></i>
                            </button>
                        </li>

                        <li>
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">SyXavissa</h4>
                            </div>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Copyright by <a href="">First Tech</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>




    </div>


    <div class="rightbar-overlay"></div>

    <script src="{{ asset('./assets/js/vendor.min.js')}}"></script>

    <script src="{{ asset('./assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{ asset('./assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('./assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>

    <script src="{{ asset('./assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('./assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ asset('./assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('./assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{ asset('./assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{asset('./assets/js/app.min.js')}}"></script>

</body>

</html>