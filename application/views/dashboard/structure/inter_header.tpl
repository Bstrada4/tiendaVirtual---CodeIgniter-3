{strip}

<body>

<div id="wrapper">

    <div class="topbar">

        <div class="topbar-left">

            <a href="{$getUrl}principal/panel" class="logo">

                <span style="color: white;">

                    <h5>PANEL DE ADMINISTRACIÓN</h5>

                </span>

                <i>

                    PA

                </i>

            </a>

        </div>



        <nav class="navbar-custom">

            <ul class="navbar-right list-inline float-right mb-0">



                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">

                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">

                        <i class="mdi mdi-fullscreen noti-icon"></i>

                    </a>

                </li>

                <li class="dropdown notification-list list-inline-item">

                    <div class="dropdown notification-list nav-pro-img">

                        <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                            <img src="{if isset($accesoTmpImagen)}{$accesoTmpImagen}{/if}" alt="{if isset($accesoTmpNombre)}{$accesoTmpNombre}{/if}" class="rounded-circle">

                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <a class="dropdown-item" href="#" onClick="location.href='{$getUrl}usuario/perfil'">

                                <i class="mdi mdi-account-circle m-r-5"></i> Perfil</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-danger" href="#" onClick="location.href='{$getUrl}acceso/proceso/logout'"><i class="mdi mdi-power text-danger"></i> Cerrar sesión</a>

                        </div>

                    </div>

                </li>



            </ul>



            <ul class="list-inline menu-left mb-0">

                <li class="float-left">

                    <button class="button-menu-mobile open-left waves-effect">

                        <i class="mdi mdi-menu"></i>

                    </button>

                </li>

            </ul>

        </nav>

    </div>



    <div class="left side-menu">

        <div class="slimscroll-menu" id="remove-scroll">



            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li>

                        <a href="{$getUrl}principal/panel" class="waves-effect {if isset($panel_active)}{$panel_active}{/if}">

                            <i class="ti-home"></i><span> Inicio </span>

                        </a>

                    </li>



                    <li>

                        <a href="{$getUrl}usuario/listar" class="waves-effect {if isset($usuario_active)}{$usuario_active}{/if}"><i class="ti-user"></i>

                            <span> Usuario </span>

                        </a>

                    </li>



                    <li class="menu-title">Menú</li>



                    <li>

                        <a href="{$getUrl}slider/listar" class="waves-effect {if isset($slider_active)}{$slider_active}{/if}"><i class="ti-image"></i>

                            <span> Slider </span>

                        </a>

                    </li>



                    <li>

                        <a href="{$getUrl}nosotros/panel" class="waves-effect {if isset($nosotros_active)}{$nosotros_active}{/if}"><i class="ti-info-alt"></i>

                            <span> Nosotros </span>

                        </a>

                    </li>



                    <li>

                        <a href="{$getUrl}nutricion/listar" class="waves-effect {if isset($nutricion_active)}{$nutricion_active}{/if}"><i class="ti-heart-broken"></i>

                            <span> Valor nutricional </span>

                        </a>

                    </li>



                    <li class="{if isset($receta_active)}{$receta_active}{/if}">

                        <a href="javascript:void(0);" class="waves-effect {if isset($receta_active)}{$receta_active}{/if}"><i class="ti-bookmark-alt"></i><span> Preparaciones <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>

                        <ul class="submenu">

                            <li><a href="{$getUrl}clasificacion/listar" class="{if isset($clasificacion_active)}{$clasificacion_active}{/if}">Categoría</a></li>

                            <li><a href="{$getUrl}recetas/listar" class="{if isset($recetas_active)}{$recetas_active}{/if}">Listar</a></li>

                        </ul>

                    </li>



                    <li>

                        <a href="{$getUrl}mitos/listar" class="waves-effect {if isset($mitos_active)}{$mitos_active}{/if}"><i class="ti-world"></i>

                            <span> Creencias </span>

                        </a>

                    </li>



                    <li class="{if isset($producto_active)}{$producto_active}{/if}">

                        <a href="javascript:void(0);" class="waves-effect {if isset($producto_active)}{$producto_active}{/if}"><i class="ti-shopping-cart"></i><span> Producto <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{$getUrl}categoria/listar" class="{if isset($categoria_active)}{$categoria_active}{/if}">Categoría</a></li>
                            <li><a href="{$getUrl}productos/listar" class="{if isset($productos_active)}{$productos_active}{/if}">Listar</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{$getUrl}clientes/listar" class="waves-effect {if isset($clientes_active)}{$clientes_active}{/if}"><i class="ti-id-badge"></i><span> Clientes </span></a>
                    </li>

                    <li>
                        <a href="{$getUrl}cotizacion/listar" class="waves-effect {if isset($cotizacion_active)}{$cotizacion_active}{/if}"><i class="ti-menu-alt"></i>
                            <span> Cotización </span>
                        </a>
                    </li>



                    {if  $accesoTmpRolId  == 500 }

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-email"></i><span> Configuración <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{$getUrl}sistemaConfig/acceso">Acceso</a></li>
                            <li><a href="{$getUrl}sistemaConfig/panel">Sistema</a></li>
                            <li><a href="{$getUrl}sociales/panel">Redes sociales</a></li>
                            <li><a href="{$getUrl}maps/panel">Google maps</a></li>
                            <li><a href="{$getUrl}contacto/panel_1">Contacto 1</a></li>
                            <li><a href="{$getUrl}contacto/panel_2">Contacto 2</a></li>
                            <li><a href="{$getUrl}contacto/panel_3">Contacto 3</a></li>
                        </ul>
                    </li>

                    {/if}

                </ul>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>

<div class="content-page">

{/strip}