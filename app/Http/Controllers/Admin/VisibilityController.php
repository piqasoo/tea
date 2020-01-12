<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Auth;
use DB;

class VisibilityController extends AdminController
{
	static $parent;
    static $module;
    static $data;

    public function __construct(){
        self::$parent = new AdminController();
    }

    public function setVisibility(Request $request, $model){
    	if(Auth::user()){
    		self::$module = self::$parent->getModule($model);
	    	if(!empty(self::$module) && (self::$module->statusCode == 1) && self::$module->data->namespace){
	            self::$data = self::$parent->initModule(self::$module->data->namespace);
	            self::$data->model = self::$module->data;
	        } 

	        $table 	= self::$data->tableName;
	        $id 	= $request->id;
	        $value 	= $request->value;

	        if($table && $id){
	        	DB::table($table)
                ->where('id', $id)
                ->update(['active' => $value]);
	        }
    	}
    	else {
    		return redirect('/');
    	}
    	
    }
}
