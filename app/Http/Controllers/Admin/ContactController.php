<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Contact;
use DB;
use Auth;

class ContactController extends AdminController
{
    static $parent;
    static $module;
    static $data;

    public function __construct(){
        $this->middleware('auth');
        self::$parent = new AdminController();
        self::$module = self::$parent->getModule('contact');
        if(!empty(self::$module) && (self::$module->statusCode == 1) && self::$module->data->namespace){
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
            $data->data = Contact::where('id', $id)->with('contact_translations')->first();
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
        $data = Contact::find($id);
        if(Auth::User() && $data){
            $request->validate([
                'mail_01'   => 'nullable|email',
                'mail_02'   => 'nullable|email',
                'facebook'  => 'nullable|url',
                'instagram' => 'nullable|url',
                'twitter'   => 'nullable|url',
                'youtube'   => 'nullable|url',
            ]);

            $data->mail_01  = $request['mail_01'];
            $data->mail_02  = $request['mail_02'];
            $data->facebook = $request['facebook'];
            $data->instagram = $request['instagram'];
            $data->twitter  = $request['twitter'];
            $data->youtube  = $request['youtube'];

            foreach (\Config::get('app.locales') as $key => $locale) {
                if(isset($request['manager'])){
                    $data->translateOrNew($locale)->manager = $request['manager'][$locale];
                }
            }
            $data->save();
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
