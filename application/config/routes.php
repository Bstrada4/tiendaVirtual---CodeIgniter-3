<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web/inicio/home';
/*
 * -------
 * CROP
 * -------
 */
$route['crop/(:num)/(:num)/(:any)'] = 'algoritmos/cropimage/$1/$2/$3';
$route['cropurl/(:num)/(:num)/(:any)'] = 'algoritmos/cropurl/$1/$2/$3';
$route['thumb/(:num)/(:num)/(:any)'] = 'algoritmos/thumbimage/$1/$2/$3';
$route['generar/(:any)'] = 'algoritmos/generate/$1';
/*
 * -------
 * API
 * -------
 */
$route['api/(:any)'] = 'api/$1';
$route['api/(:any)/(:any)'] = 'api/$1/$2';
$route['api/(:any)/(:any)/(:any)'] = 'api/$1/$2/$3';
/*
 * -------
 * DASHBOARD
 * -------
 */
$route['dashboard'] = 'dashboard/acceso/panel';
$route['dashboard/acceso/login'] = 'dashboard/acceso/proceso/login';
$route['dashboard/([a-zA-Z 0-9 -]+)/([a-zA-Z 0-9 -]+)'] = 'dashboard/$1/$2';
/*
 * -------
 * WEB
 * -------
 */
$route['/'] = 'web/inicio/home';
$route['inicio'] = 'web/inicio/home';
$route['nosotros'] = 'web/nosotros/home';
$route['nutricion'] = 'web/nutricion/home';
$route['nutricion/([a-zA-Z 0-9 -]+)'] = 'web/nutricion/home/$1';
$route['preparaciones'] = 'web/recetas/home';
$route['receta-descripcion/([a-zA-Z 0-9 -]+)'] = 'web/recetas/receta_descripcion/$1';
$route['creencias'] = 'web/mitos/home';
$route['mito-descripcion/([a-zA-Z 0-9 -]+)'] = 'web/mitos/mito_descripcion/$1';
$route['tiendas'] = 'web/puntos/puntos_venta';
$route['productos'] = 'web/productos/home';
$route['productos/listar'] = 'web/productos/proceso/listar';
$route['productos/filtrar'] = 'web/productos/proceso/filtrar';
$route['productos/ordenar'] = 'web/productos/proceso/ordenar';
$route['productos/categoria'] = 'web/productos/proceso/categoria';
$route['productos/([a-zA-Z 0-9 -]+)'] = 'web/productos/home/$1';
$route['pedidos'] = 'web/pedidos/home';
$route['pedidos/buscar'] = 'web/pedidos/proceso/buscar';
$route['pedidos/codigo/([a-zA-Z 0-9 -]+)'] = 'web/pedidos/home/$1';
$route['buscar/([a-zA-Z 0-9 -]+)'] = 'web/productos/buscar/$1';


$route['cliente/proceso/login'] = 'web/acceso/proceso/login';
$route['cliente/proceso/registro'] = 'web/acceso/proceso/registrar';
$route['cliente/cerrar'] = 'web/acceso/proceso/logout';
$route['cliente/panel'] = 'web/cliente/panel';

$route['cliente/editar'] = 'web/cliente/proceso/editar';



$route['recuperar-cuenta'] = 'web/contrasena/recuperar';
$route['recuperar/clave'] = 'web/contrasena/proceso/verificar';
$route['recuperar/activar/([a-zA-Z 0-9 -]+)'] = 'web/contrasena/proceso/activar/$1';


$route['recuperar-contrasena/([a-zA-Z 0-9 -]+)'] = 'web/contrasena/recuperar_contrasena/$1';
$route['actualizar-contrasena'] = 'web/contrasena/proceso/actualizar';


$route['carrito'] = 'web/carrito/home';
$route['carrito/agregar'] = 'web/carrito/agregar_unidad';
$route['carrito/eliminar'] = 'web/carrito/eliminar_unidad';
$route['carrito/editar'] = 'web/carrito/editar_unidad';

$route['formulario-envio'] = 'web/envio/formulario';
$route['formulario-envio/cotizar'] = 'web/envio/cotizar';

$route['cotizacion-enviada'] = 'web/cotizacion/mensaje';
/*
 * -------------
 * ERROR
 * -------------
 */
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
