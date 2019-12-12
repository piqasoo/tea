<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Route;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function initModule($module){
    	 /**
        * get config file.
        *
        * @return file
        */
    	$template = 'admin/components/layouts/tableComponent';
      $gnComponents = array();
      $trComponents = array();
      $seoComponents = array();
      $multiLang = false;

        $configFile = public_path('../'). 'resources/views/admin/modules/' . $module . '/' . 'conf.json';

        if(file_exists( $configFile )){
        	$conf = file_get_contents($configFile);
            $conf_data = json_decode($conf,true);
       	}
        if(isset($conf_data['child_plugin'])){
          if(isset($conf_data['child_plugin']['general_data'])){
            $gnComponents = $conf_data['child_plugin']['general_data'];
          }
          if(isset($conf_data['child_plugin']['translatable_data'])){
            $trComponents = $conf_data['child_plugin']['translatable_data'];
          }
          if(isset($conf_data['child_plugin']['seo_data'])){
            $seoComponents = $conf_data['child_plugin']['seo_data'];
          }
        }
        if(isset($conf_data['multiLang'])){
          $multiLang = $conf_data['multiLang'];
        }
       	// $parentRouteNames = ['admin.'.$module.'.index'];
       	$childRouteNames = [
       		'admin.'.$module.'.create', 
       		'admin.'.$module.'.edit', 
       		// 'admin.'.$module.'.update',
       		// 'admin.'.$module.'.store',
       		'admin.'.$module.'.show', 
       		];
       	$routeName = Route::currentRouteName();
       	if(in_array($routeName, $childRouteNames)){
       		$template = 'admin/components/layouts/formComponent';
       	}

       	$data = array(
       		'template'      => $template,
          'gnComponents'  => (object) $gnComponents,
          'trComponents'  => (object) $trComponents,
          'seoComponents' => (object) $seoComponents,
          'multiLang'     => $multiLang,
       	);
       	return (object) $data;
    }

    public static function getModule($module){
    	$response = array();

    	foreach (\Config::get('adminMenu') as $key => $value):
    		if($key === $module):
    			$response['statusCode'] = 1;
    			$response['data'] = (object) $value;
    			return (object) $response;
    		else:
    			$response['statusCode'] = 0;
    			$response['data'] = [];
    			$response['message'] = 'Module is not configurable!';
    			return (object) $response;
    		endif;
    	endforeach;
    	
    }
}
