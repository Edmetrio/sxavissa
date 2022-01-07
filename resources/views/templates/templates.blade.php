<!DOCTYPE html>
<html lang="pt-pt">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />


<head id="j_idt2">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{asset('./assets/images/capas.png')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link type="text/css" rel="stylesheet" href="{{asset('theme.cssb74c.css?ln=primefaces-ecuador-blue&amp;v=10.0.0')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('primeicons/primeicons.cssced1.css?ln=primefaces&amp;v=10.0.0')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('components.cssced1.css?ln=primefaces&amp;v=10.0.0')}}" />
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset ('jquery/jquery.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <script type="text/javascript" src="{{asset ('core.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <script type="text/javascript" src="{{asset ('components.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <script type="text/javascript" src="{{asset ('jquery/jquery-plugins.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset ('toggleswitch/toggleswitch.cssced1.css?ln=primefaces&amp;v=10.0.0')}}" />
    <script type="text/javascript" src="{{asset ('toggleswitch/toggleswitch.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <script type="text/javascript" src="{{asset('touch/touchswipe.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset ('schedule/schedule.cssced1.css?ln=primefaces&amp;v=10.0.0')}}" />
    <script type="text/javascript" src="{{asset('moment/moment.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <script type="text/javascript" src="{{asset('moment/moment-timezone-with-data.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <script type="text/javascript" src="{{asset('schedule/schedule.jsced1.xhtml?ln=primefaces&amp;v=10.0.0')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/primeicons.css60d1.css?ln=ecuador-layout')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/primeflex.min.css60d1.css?ln=ecuador-layout')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/demo.css9b08.css?ln=demo')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/layout-blue.css60d1.css?ln=ecuador-layout')}}" />
    <title>Syxavissa</title>
    <script type="text/javascript" src="{{ asset('assets/js/layout.js60d1.xhtml?ln=ecuador-layout')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/prism.js60d1.xhtml?ln=ecuador-layout')}}"></script>
</head>

<body>
    <div class="layout-wrapper layout-menu-static layout-menu-light ">

        <div class="layout-topbar">
            <a href="#" id="topbar-menu-button">
                <i class="pi pi-angle-left arrow"></i>
                <i class="pi pi-angle-up mobile"></i>
            </a>

            <div class="search-input">

            </div><a href="{{url('/')}}" class="logo-container"><img id="j_idt15" src="{{asset('./assets/images/footer.png')}}" alt="" /></a>



            @if (Route::has('login'))
            @auth
            <a id="topbar-profile-menu-button" href="#">
                @if(isset(Auth::user()->icon))
                <span>{{ Auth::user()->name }}</span><img id="j_idt17" src="{{asset('./assets/images/users/'.Auth::user()->icon)}}" alt="" class="topbar-profile" />
                @else
                <span>{{ Auth::user()->name }}</span><img id="j_idt17" src="{{asset('./assets/images/users/Milton.jpg')}}" alt="" class="topbar-profile" />
                @endif
                <i class="pi pi-caret-down"></i>
            </a>
            <ul id="topbar-usermenu" class="fadeInDown animated">
                <li>
                    <a href="{{ route('perfil.index')  }}">
                        <i class="pi pi-fw pi-user"></i>
                        <span class="topbar-item-name">Perfil</span>
                        <span class="topbar-submenuitem-badge">0</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pi pi-fw pi-cog"></i>
                        <span class="topbar-item-name">Definições</span>
                        <span class="topbar-submenuitem-badge">0</span>
                    </a>
                    <ul>
                        <li role="menuitem">
                            <a href="#">
                                <i class="pi pi-fw pi-palette"></i>
                                <span>Mudar</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="pi pi-fw pi-envelope"></i>
                        <span class="topbar-item-name">Mensagens</span>
                    </a>
                    <ul>
                        <li role="menuitem">
                            <a href="#" class="topbar-message"><img id="j_idt19" src="javax.faces.resource/images/avatar-brooke.png60d1.png?ln=ecuador-layout" alt="" width="25" />
                                <span>1 Mensagem</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="pi pi-fw pi-bell"></i>
                        <span class="topbar-item-name">Notificações</span>
                    </a>
                    <ul>
                        <li role="menuitem">
                            <a href="#">
                                <i class="pi pi-fw pi-sliders-h"></i>
                                <span>Pendente </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr />
                <li>
                    
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="layout-menuitem-icon pi pi-fw pi-sign-in"></i>

                            {{ __('Sair') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
            @else
            <a id="topbar-profile-menu-button" href="#">
                <span>Conta</span><img id="j_idt17" src="{{asset('./assets/images/users/Milton.jpg')}}" alt="" class="topbar-profile" />
                <i class="pi pi-caret-down"></i>
            </a>
            <ul id="topbar-usermenu" class="fadeInDown animated">
                <li>
                    <a href="{{ route('login') }}">
                        <i class="pi pi-fw pi-user"></i>
                        <span class="topbar-item-name">Entrar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <i class="pi pi-fw pi-user"></i>
                        <span class="topbar-item-name">Registrar</span>
                    </a>
                </li>
            </ul>
            @endauth
            @endif
        </div>

        <div class="layout-sidebar">
            <div class="layout-menu-title">MENÚ PRINCIPAL</div>
            <form id="menuform" name="menuform" method="post" action="" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="menuform" value="menuform" />
                <ul id="menuform:j_idt64" class="layout-menu">
                    <li id="menuform:om_dashboard" role="menuitem"><a href="{{url('/')}}"><i class="layout-menuitem-icon pi pi-fw pi-home"></i><span>Início</span></a>
                        <div class="layout-menu-tooltip">
                            <div class="layout-menu-tooltip-arrow"></div>
                            <div class="layout-menu-tooltip-text">Início</div>
                        </div>
                    </li>
                    <li id="menuform:om_components" role="menuitem"><a href="#"><i class="layout-menuitem-icon pi pi-fw pi-star"></i><span>Categorias</span><i class="pi pi-fw pi-angle-down layout-menuitem-toggler"></i></a>
                        <div class="layout-menu-tooltip">
                            <div class="layout-menu-tooltip-arrow"></div>
                            <div class="layout-menu-tooltip-text">UI Kit</div>
                        </div>
                        <ul role="menu">
                            <li id="menuform:om_formlayout" role="menuitem"><a href="{{ route('categoria.index') }}"><i class="layout-menuitem-icon pi pi-fw pi-id-card"></i><span>Categoria</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Categoria</div>
                                </div>
                            </li>
                            <li id="menuform:om_panel" role="menuitem"><a href="{{ route('subcategoria.index') }}"><i class="layout-menuitem-icon pi pi-fw pi-tablet"></i><span>Subcategoria</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Subcategoria</div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li id="menuform:om_utils" role="menuitem"><a href="#"><i class="layout-menuitem-icon pi pi-fw pi-compass"></i><span>Artigos</span><i class="pi pi-fw pi-angle-down layout-menuitem-toggler"></i></a>
                        <div class="layout-menu-tooltip">
                            <div class="layout-menu-tooltip-arrow"></div>
                            <div class="layout-menu-tooltip-text">Artigos</div>
                        </div>
                        <ul role="menu">
                            <li id="menuform:om_elevation" role="menuitem"><a href="{{ url('artigos') }}"><i class="layout-menuitem-icon pi pi-fw pi-slack"></i><span>Artigo</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Artigo</div>
                                </div>
                            </li>
                            <li id="menuform:om_elevation" role="menuitem"><a href="{{ url('materia') }}"><i class="layout-menuitem-icon pi pi-fw pi-discord"></i><span>Matéria-Prima</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Matéria-Prima</div>
                                </div>
                            </li>
                            <li id="menuform:om_elevation" role="menuitem"><a href="{{ url('composicaos') }}"><i class="layout-menuitem-icon pi pi-fw pi-shield"></i><span>Composição</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Composição</div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li id="menuform:om_default" role="menuitem"><a href="#"><i class="layout-menuitem-icon pi pi-fw pi-briefcase"></i><span>Estoques</span><i class="pi pi-fw pi-angle-down layout-menuitem-toggler"></i></a>
                        <div class="layout-menu-tooltip">
                            <div class="layout-menu-tooltip-arrow"></div>
                            <div class="layout-menu-tooltip-text">Pages</div>
                        </div>
                        <ul role="menu">
                            <li id="menuform:om_chronoline" role="menuitem"><a href="{{ route('stock.index') }}"><i class="layout-menuitem-icon pi pi-fw pi-ticket"></i><span>Estoque</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Estoque</div>
                                </div>
                            </li>
                            <li id="menuform:om_chronoline" role="menuitem"><a href="{{ url('aumentos') }}"><i class="layout-menuitem-icon pi pi-fw pi-calendar"></i><span>Aumento</span></a>
                                <div class="layout-menu-tooltip">
                                    <div class="layout-menu-tooltip-arrow"></div>
                                    <div class="layout-menu-tooltip-text">Aumento</div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li id="menuform:om_buy" role="menuitem"><a href="{{ url('vendas') }}"><i class="layout-menuitem-icon pi pi-fw pi-shopping-cart"></i><span>Venda</span></a>
                        <div class="layout-menu-tooltip">
                            <div class="layout-menu-tooltip-arrow"></div>
                            <div class="layout-menu-tooltip-text">Buy Now</div>
                        </div>
                    </li>
                    <li id="menuform:om_doc" role="menuitem"><a href="{{ url('relatorios') }}"><i class="layout-menuitem-icon pi pi-fw pi-info-circle"></i><span>Relatório</span></a>
                        <div class="layout-menu-tooltip">
                            <div class="layout-menu-tooltip-arrow"></div>
                            <div class="layout-menu-tooltip-text">Documentation</div>
                        </div>
                    </li>
                </ul>
                <script id="menuform:j_idt64_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("Ecuador", "me", {
                            id: "menuform:j_idt64",
                            statefulScroll: true
                        });
                    });
                </script>
                <script id="menuform:j_idt64_s" type="text/javascript">
                    PrimeFaces.cw("Ecuador", "me", {
                        id: "menuform:j_idt64",
                        statefulScroll: true,
                        pathname: "/ecuador/dashboard.xhtml"
                    });
                </script>
                <input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0" value="-6049801819330887879:7954657649331706999" autocomplete="off" />
            </form>
        </div>

        <a tabindex="0" id="layout-config-button" class="layout-config-button">
            <i class="pi pi-cog"></i>
        </a>

        <div class="layout-config">
            <h5>Tipo de Menú</h5>
            <form id="config-form" name="config-form" method="post" action="http://firsteducation.edu.mz/" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="config-form" value="config-form" />
                <table id="config-form:j_idt67" role="presentation" class="ui-selectoneradio ui-widget">
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt67:0" name="config-form:j_idt67" type="radio" value="layout-menu-static" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuMode(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt67&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt67&quot;,u:&quot;config-form&quot;});}])" checked="checked" /></div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default ui-state-active">
                                    <span class="ui-radiobutton-icon ui-icon ui-icon-bullet ui-c"></span>
                                </div>
                            </div><label for="config-form:j_idt67:0">Estático</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt67:1" name="config-form:j_idt67" type="radio" value="layout-menu-overlay" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuMode(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt67&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt67&quot;,u:&quot;config-form&quot;});}])" />
                                </div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default"><span class="ui-radiobutton-icon ui-icon ui-icon-blank ui-c"></span></div>
                            </div><label for="config-form:j_idt67:1">Sobreposição</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt67:2" name="config-form:j_idt67" type="radio" value="layout-menu-slim" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuMode(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt67&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt67&quot;,u:&quot;config-form&quot;});}])" />
                                </div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default"><span class="ui-radiobutton-icon ui-icon ui-icon-blank ui-c"></span></div>
                            </div><label for="config-form:j_idt67:2">Esbelto</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt67:3" name="config-form:j_idt67" type="radio" value="layout-menu-horizontal" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuMode(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt67&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt67&quot;,u:&quot;config-form&quot;});}])" />
                                </div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default"><span class="ui-radiobutton-icon ui-icon ui-icon-blank ui-c"></span></div>
                            </div><label for="config-form:j_idt67:3">Horizontal</label>
                        </td>
                    </tr>
                </table>
                <script id="config-form:j_idt67_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("SelectOneRadio", "widget_config_form_j_idt67", {
                            id: "config-form:j_idt67",
                            unselectable: false
                        });
                    });
                </script>

                <hr />

                <h5>Cor do Menú</h5>
                <table id="config-form:j_idt73" role="presentation" class="ui-selectoneradio ui-widget">
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt73:0" name="config-form:j_idt73" type="radio" value="light" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuColor(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt73&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt73&quot;,u:&quot;config-form&quot;});}])" checked="checked" /></div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default ui-state-active">
                                    <span class="ui-radiobutton-icon ui-icon ui-icon-bullet ui-c"></span>
                                </div>
                            </div><label for="config-form:j_idt73:0">Claro</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt73:1" name="config-form:j_idt73" type="radio" value="dark" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuColor(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt73&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt73&quot;,u:&quot;config-form&quot;});}])" />
                                </div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default"><span class="ui-radiobutton-icon ui-icon ui-icon-blank ui-c"></span></div>
                            </div><label for="config-form:j_idt73:1">Escuro</label>
                        </td>
                    </tr>
                </table>
                <script id="config-form:j_idt73_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("SelectOneRadio", "widget_config_form_j_idt73", {
                            id: "config-form:j_idt73",
                            unselectable: false
                        });
                    });
                </script>

                <hr />

                <h5>Estilo de Entrada</h5>
                <table id="config-form:j_idt77" role="presentation" class="ui-selectoneradio ui-widget">
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt77:0" name="config-form:j_idt77" type="radio" value="outlined" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.updateInputStyle(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt77&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt77&quot;});}])" checked="checked" /></div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default ui-state-active">
                                    <span class="ui-radiobutton-icon ui-icon ui-icon-bullet ui-c"></span>
                                </div>
                            </div><label for="config-form:j_idt77:0">Delineado</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ui-radiobutton ui-widget">
                                <div class="ui-helper-hidden-accessible"><input id="config-form:j_idt77:1" name="config-form:j_idt77" type="radio" value="filled" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.updateInputStyle(event.target.value)},function(event){PrimeFaces.ab({s:&quot;config-form:j_idt77&quot;,e:&quot;valueChange&quot;,f:&quot;config-form&quot;,p:&quot;config-form:j_idt77&quot;});}])" />
                                </div>
                                <div class="ui-radiobutton-box ui-widget ui-corner-all ui-state-default"><span class="ui-radiobutton-icon ui-icon ui-icon-blank ui-c"></span></div>
                            </div><label for="config-form:j_idt77:1">Preenchido</label>
                        </td>
                    </tr>
                </table>
                <script id="config-form:j_idt77_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("SelectOneRadio", "widget_config_form_j_idt77", {
                            id: "config-form:j_idt77",
                            unselectable: false
                        });
                    });
                </script>

                <hr />

                <h5>Rotação</h5>
                <div id="config-form:rtl-switch" class="ui-toggleswitch ui-widget" role="checkbox">
                    <div class="ui-helper-hidden-accessible"><input id="config-form:rtl-switch_input" name="config-form:rtl-switch_input" type="checkbox" onchange="PrimeFaces.bcn(this,event,[function(event){PrimeFaces.EcuadorConfigurator.changeMenuToRTL()},function(event){PrimeFaces.ab({s:&quot;config-form:rtl-switch&quot;,e:&quot;change&quot;,f:&quot;config-form&quot;,p:&quot;config-form:rtl-switch&quot;,u:&quot;config-form&quot;,onst:function(cfg){PrimeFaces.EcuadorConfigurator.beforeResourceChange();}});}]);" />
                    </div>
                    <div class="ui-toggleswitch-slider"></div>
                </div>
                <script id="config-form:rtl-switch_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("ToggleSwitch", "widget_config_form_rtl_switch", {
                            id: "config-form:rtl-switch"
                        });
                    });
                </script>

                <hr />

            </form>
        </div>

        <div class="layout-main">
            @yield('content')

        </div>
    </div>
</body>


</html>