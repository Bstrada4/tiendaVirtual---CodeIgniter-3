<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                    </ol>

                </div>
                <div class="col-sm-6"> 
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-2"></i> Settings
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">VALOR NUTRICIONAL</h5>
                            <h4 class="font-500">{$total_nutricion} <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{$getUrl}nutricion/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">PREPARACIONES</h5>
                            <h4 class="font-500">{$total_receta} <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{$getUrl}recetas/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">CLIENTES</h5>
                            <h4 class="font-500">{$total_cliente} <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{$getUrl}clientes/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                           
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">PRODUCTOS</h5>
                            <h4 class="font-500">{$total_productos} <i class="mdi  text-success ml-2"></i></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{$getUrl}productos/listar" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Ver mas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>