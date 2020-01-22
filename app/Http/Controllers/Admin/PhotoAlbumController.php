<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Providers\MediaProvider as MediaLibrary;
use App\PhotoAlbum;
use DB;
use Auth;

class PhotoAlbumController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        $this->middleware('auth');
        $moduleName = 'photo_album'; //module name
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule($moduleName);
        // dd(self::$module);
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
            $data->data = PhotoAlbum::with('photo_album_translations')->paginate(15);
            $data->action = $data->route;
            $data->method = 'POST';
            $data->editRoute = 'admin.'.$data->model->namespace.'.edit';
            $data->deleteRoute = 'Admin\PhotoAlbumController@destroy';
            //// ['Admin\PressController@destroy', $row['id']]
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
            $data->data = new PhotoAlbum;
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
        $data = new PhotoAlbum;
        if(Auth::User()){
            $request->validate([
                'image' => 'required|image',
                'title' => 'required|array',
                'title.*' => 'required|max:255',
                'text' => 'nullable',
                'images' => 'required|array',
                'images.*' => 'required|image',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title'])){
                    $data->translateOrNew($locale)->title = $request['title'][$locale];
                    $data->translateOrNew($locale)->slug = str_slug($request['title'][$locale]);
                }
            }
            if(isset($request['date'])){
                $data->date = $request['date'];
            }
            if(isset($request['top'])){
                $data->top = $request['top'];
            }
            $data->save();

            if(isset($request['image'])){
                MediaLibrary::putImage($data, 'image', $request['image'],  'photo_album');
            }
            if(isset($request['images'])){
                MediaLibrary::putImages($data,  $request['images'], 'photo_album', 'image',  50);
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
        $param = 'param';
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.create';
            $data->data = PhotoAlbum::with('media')->find($id);
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
        $data = PhotoAlbum::find($id);
        if(Auth::User()){
            $request->validate([
                'image' => 'nullable|image',
                'title' => 'required|array',
                'title.*' => 'required|max:255',
                'text' => 'nullable',
                'images' => 'nullable|array',
                'images.*' => 'nullable|image',
            ]);
            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title'])){
                    $data->translateOrNew($locale)->title = $request['title'][$locale];
                    $data->translateOrNew($locale)->slug = str_slug($request['title'][$locale]);
                }
            }
            if(isset($request['top'])){
                $data->top = $request['top'];
            }
            if(isset($request['date'])){
                $data->date = $request['date'];
            }
            $data->save();

            if(isset($request['image'])){
                MediaLibrary::putImage($data, 'image', $request['image'],  'photo_album');
            }
            if(isset($request['images'])){
                MediaLibrary::putImages($data,  $request['images'], 'photo_album', 'image',  50);
            }
            if(isset($request['sort-images'])){
            	$orderData = json_decode($request['sort-images']);
            	if(!empty($orderData)){
            		MediaLibrary::sortImages($orderData);
            	}
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
        $data = PhotoAlbum::find($id);
        if(Auth::User() && $data){
            MediaLibrary::deletefiles($data, 'photo_album');
            $data->delete();
            return back();
        }
        else {
            return redirect('/');
        }
    }
}
