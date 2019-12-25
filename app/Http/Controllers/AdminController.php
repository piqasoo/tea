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
      $parentComponent = array();
      $multiLang = false;
      $routeName = '';
      $formDescription = '';

        $configFile = public_path('../'). 'resources/views/admin/modules/' . $module . '/' . 'conf.json';

        if(file_exists( $configFile )){
        	$conf = file_get_contents($configFile);
            $conf_data = json_decode($conf,true);
       	}
        if(isset($conf_data['parent_plugin'])){
          $parentComponent = $conf_data['parent_plugin'];
        }
        if(isset($conf_data['child_plugin'])){
          if(isset($conf_data['child_plugin']['general_data'])){
            $gnComponents = $conf_data['child_plugin']['general_data'];
            $gnComponents = (object) $gnComponents;
          }
          if(isset($conf_data['child_plugin']['translatable_data'])){
            $trComponents = $conf_data['child_plugin']['translatable_data'];
            $trComponents = (object) $trComponents;
          }
          if(isset($conf_data['child_plugin']['seo_data'])){
            $seoComponents = $conf_data['child_plugin']['seo_data'];
            $seoComponents = (object) $seoComponents;
          }
          if(isset($conf_data['child_plugin']['description'])){
            $formDescription = $conf_data['child_plugin']['description'];
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
          'parentComponent' => $parentComponent,
          'gnComponents'  => $gnComponents,
          'trComponents'  => $trComponents,
          'seoComponents' => $seoComponents,
          'multiLang'     => $multiLang,
          'route'         => $routeName,
          'formDescription' => $formDescription,
       	);
       	return (object) $data;
    }

    public static function getModule($module){
    	$response = array();
    	foreach (\Config::get('adminMenu') as $key => $value):
    		if($key === $module):
    			$response['statusCode'] = 1;
    			$response['data'] = (object) $value;
          break;
    		else:
    			$response['statusCode'] = 0;
    			$response['data'] = [];
    			$response['message'] = 'Module is not configurable!';
    		endif;
    	endforeach;
    	return (object) $response;
    }
}
