<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Providers\MediaProvider as MediaLibrary;
use App\About;
use DB;
use Auth;

class AboutController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        $this->middleware('auth');
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule('about');
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if(Auth::User() && !empty($data->model)){
            $data->route = 'admin.'.$data->model->namespace.'.update';
            $data->data = About::where('id', $id)->with('about_translations')->first();
            $data->action = [$data->route, $data->data->id];
            $data->method = 'PUT';
            return view('admin.index', compact('data'));
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
        $data = About::find($id);
        if(Auth::User() && $data){
            $request->validate([
                'title' => 'required|array',
                'title.*' => 'required|string|max:255',
                'text' => 'nullable|array',
                'text.*' => 'nullable|string',
                'image' => 'nullable|image|dimensions:max_width=1200|mimes:jpeg,bmp,png'
            ]);

            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['title'])){
                    $data->translateOrNew($locale)->title = $request['title'][$locale];
                }
                if(isset($request['text'])){
                    $data->translateOrNew($locale)->text = $request['text'][$locale];
                }
                if(isset($request['description'])){
                    $data->translateOrNew($locale)->description = $request['description'][$locale];
                }
                if(isset($request['keywords'])){
                    $data->translateOrNew($locale)->keywords = $request['keywords'][$locale];
                }
            }
            $data->save();

            if(isset($request['image'])){

                MediaLibrary::putImage($data, 'image', $request['image'],  'about');
            }
            // MediaLibrary
            
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
