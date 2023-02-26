<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// $route['default_controller'] = 'Adm_core';
$route['default_controller'] = 'Ui';
$route['404_override'] = '';
// $route['ordac90/(:num)'] = 'Ads_order/st0/$1';
$route['translate_uri_dashes'] = true;

$route['home'] = 'Ui';
$route['(:num)'] = 'Ui/ui/$1';
$route['(:segment)'] = 'Ui/ui/$1';
$route['home/(:any)'] = 'Ui/ui/$1';

$route['rumah'] = 'dashboard/User';
$route['kimochi'] = 'dashboard/User/login';
$route['duhdek'] = 'dashboard/User/logout';

$route['meta'] = 'dashboard/admmap/meta';
$route['description'] = 'dashboard/admmap/deskripsi';
$route['keyword'] = 'dashboard/admmap/katakunci';

$route['contact'] = 'dashboard/admmap/contact';
$route['ubahcon/(:num)'] = 'dashboard/admmap/viewcontact/$1';
$route['editcon/(:num)'] = 'dashboard/admmap/editcontact/$1';
$route['disablecon/(:num)'] = 'dashboard/admmap/disable/$1';
$route['enablecon/(:num)'] = 'dashboard/admmap/enable/$1';

$route['sosmed'] = 'dashboard/admmap/sosmed';
$route['editsos/(:num)'] = 'dashboard/admmap/editsost/$1';

$route['category'] = 'dashboard/category';
$route['addcat'] = 'dashboard/category/add';
$route['addpros'] = 'dashboard/category/tambah';
$route['ubahcat/(:num)'] = 'dashboard/category/viewcat/$1';
$route['editcat/(:num)'] = 'dashboard/category/editcat/$1';
$route['disablecat/(:num)'] = 'dashboard/category/disable/$1';
$route['enablecat/(:num)'] = 'dashboard/category/enable/$1';


$route['lamanaktif'] = 'dashboard/laman/aktif';
$route['disablelaman/(:num)'] = 'dashboard/laman/disable/$1';
$route['enablelaman/(:num)'] = 'dashboard/laman/enable/$1';

$route['kontenlaman'] = 'dashboard/laman/judullaman';
$route['ubahkonten/(:num)'] = 'dashboard/laman/viewkonten/$1';

$route['editkonten/(:num)'] = 'dashboard/laman/editkonten/$1';

$route['eunsecure'] = 'dashboard/unsecem/sender';
$route['ubah_eunsecure/(:num)'] = 'dashboard/unsecem/viewsender/$1';

$route['edit_email/(:num)'] = 'dashboard/unsecem/editemail/$1';

$route['ereport'] = 'dashboard/unsecem/report';
$route['ubah_ereport/(:num)'] = 'dashboard/unsecem/viewereport/$1';

$route['secclient'] = 'dashboard/secmen/client';
$route['secclientadd'] = 'dashboard/secmen/clientadd';
$route['detailcli/(:num)'] = 'dashboard/secmen/clidetail/$1';

$route['disablescli/(:num)'] = 'dashboard/secmen/clidisable/$1';
$route['enablescli/(:num)'] = 'dashboard/secmen/clienable/$1';

$route['hapusr/(:num)'] = 'dashboard/secmen/hapus/$1';
$route['delete1/(:num)'] = 'dashboard/secmen/delete1/$1';
$route['delete2/(:num)'] = 'dashboard/secmen/delete2/$1';

$route['secserv'] = 'dashboard/secmen/serv';
$route['secservadd'] = 'dashboard/secmen/serv_add';
$route['secserv/(:num)'] = 'dashboard/secmen/serv/$1';
$route['disableserv/(:num)'] = 'dashboard/secmen/serd/$1';
$route['enableserv/(:num)'] = 'dashboard/secmen/sere/$1';
$route['ubah_secserv/(:num)'] = 'dashboard/secmen/editserv/$1';
$route['editsec/(:num)'] = 'dashboard/secmen/edit/$1';

$route['testi'] = 'dashboard/secmen/testimonial';
$route['testivadd'] = 'dashboard/secmen/testimonialadd';

$route['galery'] = 'dashboard/portofolio/gal';
$route['addpor'] = 'dashboard/portofolio/tambah';

$route['galery/(:num)'] = 'dashboard/portofolio/gal/$1';
$route['detdel/(:num)'] = 'dashboard/portofolio/del/$1';

$route['detdis/(:num)'] = 'dashboard/portofolio/dis/$1';
$route['detena/(:num)'] = 'dashboard/portofolio/ena/$1';

$route['feedback'] = 'dashboard/feedback/pesan';
$route['baca/(:num)'] = 'dashboard/feedback/baca/$1';
$route['hap/(:num)'] = 'dashboard/feedback/del/$1';

$route['gantipass'] = 'dashboard/User/ganti';
