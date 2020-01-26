<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Providers\MediaProvider as MediaLibrary;
use App\Banner;
use DB;
use Auth;

class BannerController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        $this->middleware('auth');
        $moduleName = 'banners'; //module name
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule($moduleName);
        if(!empty(self::$module) && self::$module->data->namespace){
            self::$data = self::$parent->initModule(self::$module->data->namespace);
            self::$data->model = self::$module->data;
        }      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = Banner::with('banner_translations')->paginate(15);
            $data->action = $data->route;
            $data->method = 'POST';
            $data->editRoute = 'admin.'.$data->model->namespace.'.edit';
            $data->deleteRoute = 'Admin\BannerController@destroy';
            // ['Admin\PressController@destroy', $row['id']]
            return view('admin.index', compact('data'));
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = self::$data;
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = new Banner;
            $data->action = ['admin.'.$data->model->namespace.'.store'];
            $data->method = 'POST';
            return view('admin.index', compact('data'));
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = self::$data;
        $data = new Banner;
        if(Auth::User()){
            $request->validate([
                'image' => 'required|image',
                'title_01' => 'required|array',
                'title_01.*' => 'required|max:255',
                'page' => 'required',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title_01'])){
                    $data->translateOrNew($locale)->title_01 = $request['title_01'][$locale];
                }
                if(isset($request['title_02'])){
                    $data->translateOrNew($locale)->title_02 = $request['title_02'][$locale];
                }
            }
            if(isset($request['page'])){
                $data->page = $request['page'];
            }
            $data->image = '';
            $data->save();

            if(isset($request['image'])){
                MediaLibrary::putImage($data, 'image', $request['image'],  'banners');
            }

            return redirect('admin/'.$model->model->namespace);
        }
        else {
            return redirect('/');
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = self::$data;
        $param = 'banner';
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = Banner::find($id);
            $data->action = ['admin.'.$data->model->namespace.'.update', $param => $id];
            $data->method = 'PUT';
            if(isset($data->data)){
                return view('admin.index', compact('data'));
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = self::$data;
        $data = Banner::find($id);
        if(Auth::User()){
            $request->validate([
                'image' => 'nullable|image',
                'title_01' => 'required|array',
                'title_01.*' => 'required|max:255',
                'page' => 'required',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title_01'])){
                    $data->translateOrNew($locale)->title_01 = $request['title_01'][$locale];
                }
                if(isset($request['title_02'])){
                    $data->translateOrNew($locale)->title_02 = $request['title_02'][$locale];
                }
            }
            if(isset($request['page'])){
                $data->page = $request['page'];
            }
            $data->save();

            if(isset($request['image'])){
                MediaLibrary::putImage($data, 'image', $request['image'],  'banners');
            }

            return redirect('admin/'.$model->model->namespace);
        }
        else {
            return redirect('/');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banner::find($id);
        if(Auth::User() && $data){
            MediaLibrary::deleteImage($data, 'image',  'banner');
            $data->delete();
            return back();
        }
        else {
            return redirect('/');
        }
    }
}
