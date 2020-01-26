<?php

namespace App\Http\Controllers;
use App\About;
use App\Slider;
use App\Events;
use App\Video;
use App\PhotoAlbum;
use App\Review;
use App\News;
use App\Contact;
use App\Banner;
use App\Messages;
use Carbon;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	static $generalData;

	public function __construct(){

		$currentDate = \Carbon\Carbon::now()->format('Y-m-d');
        $events = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->skip(0)->take(3)->get();
        $news = News::where('active', true)->orderBy('date', 'desc')->skip(0)->take(3)->get();
        $contact = Contact::find(1);
        $currentRoute = \Request::route()->getName();
        $activeRoute = isset($currentRoute) ? $currentRoute : 'home';

        $data = array(
        	'events' => $events,
        	'news'	 => $news,
        	'contact' => $contact,
            'activeRoute' => $activeRoute,
        );
        self::$generalData = (object) $data;
    }
    public function homePage(){
    	$data = [];
    	$general = self::$generalData;
    	$data['general'] = $general;

    	$slider = Slider::where('active', true)->orderBy('ord', 'asc')->get();
    	$currentDate = \Carbon\Carbon::now()->format('Y-m-d');
        $topEvent = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->first();
        if($topEvent){
            $events = Events::whereDate('date', '>=', $currentDate)->where('id', '!=', $topEvent->id)->orderBy('date', 'asc')->get();
        }
        else{
            $events = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->get();
        }
    	$news = News::where('active', true)->orderBy('date', 'desc')->skip(0)->take(2)->get();
    	$reviews = Review::where('active', true)->orderBy('ord', 'asc')->get();
    	$videos = Video::where('active', true)->orderBy('date', 'desc')->skip(0)->take(2)->get();
        $photoAlbum = PhotoAlbum::where(['active'=> 1, 'top' => 1])->with('media')->first();
    	$pageData = array(
    		'slides' => $slider,
            'topEvent' => $topEvent,
    		'events' => $events,
    		'news' => $news,
    		'reviews'	=> $reviews,
    		'videos'	=> $videos,
            'photoAlbum' => $photoAlbum,
    	);
    	$data['data'] = (object) $pageData;
    	$data = (object) $data;
    	return view('home', compact('data'));
    }

    public function biographyPage(){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $biography = About::first();
        $banner = Banner::where('page', 'biography')->where('active', true)->first();
        $seo = array(
            'title' => trans('texts.title_biography'),
            'description' => trans('texts.description_biography'),
            'keywords' => trans('texts.keywords_biography'),
            'image' => null,
        );
        $pageData = array(
            'banner' => $banner,
            'biography' => $biography,
            'seo'   => (object) $seo,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
    	return view('biography', compact('data'));
    }
    public function eventsPage($filter){
        $data = [];
        $events = [];
        $banner = null;
        $topEvent = null;
        $general = self::$generalData;
        $data['general'] = $general;
        $filters = ['future', 'passed'];
        $currentDate = \Carbon\Carbon::now()->format('Y-m-d');
        $seo = array(
            'title' => trans('texts.title_events'),
            'description' => trans('texts.description_events'),
            'keywords' => trans('texts.keywords_events'),
            'image' => null,
        );

        if(in_array($filter, $filters)){
            if($filter && $filter == 'future'){
                $topEvent = Events::whereDate('date', '>=', $currentDate)->orderBy('date', 'asc')->first();
                $events = Events::whereDate('date', '>=', $currentDate)->where('id', '!=', $topEvent->id)->orderBy('date', 'asc')->get();
                $banner = Banner::where('page', 'events-future')->where('active', true)->first();
            }
            elseif($filter == 'passed'){
                $events = Events::whereDate('date', '<=', $currentDate)->orderBy('date', 'asc')->get();
                $banner = Banner::where('page', 'events-passed')->where('active', true)->first();
            }
            $pageData = array(
                'seo'   => (object) $seo,
                'banner' => $banner,
                'topEvent' => $topEvent,
                'events' => $events,
                'filter' => $filter,
            );
            $data['data'] = (object) $pageData;
            $data = (object) $data;
            return view('events', compact('data'));
        }
        else {
            return redirect('/');
        }
        
    }
    public function pressPage(){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $news = News::where('active', true)->orderBy('date', 'desc')->paginate(12);
        $seo = array(
            'title' => trans('texts.title_press'),
            'description' => trans('texts.description_press'),
            'keywords' => trans('texts.keywords_press'),
            'image' => null,
        );
        $pageData = array(
            'seo'   => (object) $seo,
            'news' => $news,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('press', compact('data'));
    }

    public function articlePage($slug, $id){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $post = null;
        $news = [];

        if($slug && $id){
            $post = News::where('active', true)->find($id);
            if($post){
                $news = News::where('active', true)->where('id', '!=', $post->id)->orderBy('date', 'desc')->skip(0)->take(3)->get();
            }
        }
        $seo = [];
        $keywords = '';
        if($post){
            foreach (explode(" ", str_replace(array('.', ','), '' , $post->title_01)) as $key ) {
                $keywords .= strtolower($key).', ';
            }
            $seo = array(
                'title' => $post->title_01,
                'description' => $post->text,
                'keywords' => $keywords,
                'image' => asset('/uploads/news/'.$post->image),
            );  
        }
        $banner = Banner::where('page', 'article')->where('active', true)->first();
        $pageData = array(
            'seo'   => (object) $seo,
            'banner'   => $banner,
            'post' => $post,
            'news' => $news,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('press-article', compact('data'));
    }

    public function eventPage($slug, $id){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $post = null;
        $events = [];

        if($slug && $id){
            $event = Events::where('active', true)->find($id);
            if($event){
                $events = Events::where('active', true)->where('id', '!=', $event->id)->orderBy('date', 'desc')->skip(0)->take(2)->get();
            }
        }
        $banner = Banner::where('page', 'event')->where('active', true)->first();
        $seo = [];
        $keywords = '';
        if($event){
            foreach (explode(" ", str_replace(array('.', ','), '' , $event->name. ' ' . $event->place)) as $key ) {
                $keywords .= strtolower($key).', ';
            }
            $seo = array(
                'title' => $event->name. ' | ' . $event->place,
                'description' => $event->text,
                'keywords' => $keywords,
                'image' => null,
            );  
        }
        $pageData = array(
            'seo'   => (object) $seo,
            'event' => $event,
            'events' => $events,
            'banner' => $banner,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('event', compact('data'));
    }

    public function reviewPage(){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $banner = Banner::where('page', 'review')->where('active', true)->first(); 
        $reviews = Review::where('active', 1)->orderBy('ord', 'asc')->get();
        $seo = array(
            'title' => trans('texts.title_reviews'),
            'description' => trans('texts.description_reviews'),
            'keywords' => trans('texts.keywords_reviews'),
            'image' => null,
        );
        $pageData = array(
            'seo'   => (object) $seo,
            'banner' => $banner,
            'reviews' => $reviews,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('reviews', compact('data'));
    }
    public function galleryPhotoPage(){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $banner = Banner::where('page', 'multimedia')->where('active', true)->first(); 
        $albums = PhotoAlbum::where('active', 1)->with('media')->orderBy('date', 'desc')->get();
        $seo = array(
            'title' => trans('texts.title_gallery_photo'),
            'description' => trans('texts.description_gallery_photo'),
            'keywords' => trans('texts.keywords_gallery_photo'),
            'image' => null,
        );
        $pageData = array(
            'seo'   => (object) $seo,
            'banner' => $banner,
            'albums' => $albums,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('gallery-photo', compact('data'));
    }

    public function galleryDetaildPhotoPage($slug, $id){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $banner = Banner::where('page', 'multimedia')->where('active', true)->first(); 
        $album = PhotoAlbum::where('active', 1)->where('id', $id)->with('media')->first();
        $seo = [];
        $keywords = '';
        if($album){
            foreach (explode(" ", str_replace(array('.', ','), '' , $album->title)) as $key ) {
                $keywords .= strtolower($key).', ';
            }
            $seo = array(
                'title' => $album->title,
                'description' => $album->text,
                'keywords' => $keywords,
                'image' => asset('/uploads/photo_album/'.$album->image),
            );  
        }
        $pageData = array(
            'seo'   => (object) $seo,
            'banner' => $banner,
            'album' => $album,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('gallery-photo-detailed', compact('data'));
    }

    public function contactPage()
    {
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $banner = Banner::where('page', 'contact')->where('active', true)->first(); 
        $seo = array(
            'title' => trans('texts.title_contact'),
            'description' => trans('texts.description_contact'),
            'keywords' => trans('texts.keywords_contact'),
            'image' => null,
        );
        $pageData = array(
            'seo'   => (object) $seo,
            'banner' => $banner,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('contact', compact('data'));
    }
    public function galleryVideoPage(){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $banner = Banner::where('page', 'multimedia')->where('active', true)->first(); 
        $albums = Video::where('active', 1)->paginate(10);
        $seo = array(
            'title' => trans('texts.title_gallery_video'),
            'description' => trans('texts.description_gallery_video'),
            'keywords' => trans('texts.keywords_gallery_video'),
            'image' => null,
        );
        $pageData = array(
            'seo'   => (object) $seo,
            'banner' => $banner,
            'albums' => $albums,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('gallery-video', compact('data'));
    }
    public function galleryDetaildVideoPage($slug, $id){
        $data = [];
        $general = self::$generalData;
        $data['general'] = $general;
        $banner = Banner::where('page', 'multimedia')->where('active', true)->first(); 
        $album = Video::where('active', 1)->where('id', $id)->first();
        $seo = [];
        $keywords = '';
        if($album){
            foreach (explode(" ", str_replace(array('.', ','), '' , $album->title)) as $key ) {
                $keywords .= strtolower($key).', ';
            }
            $seo = array(
                'title' => $album->title,
                'description' => $album->text,
                'keywords' => $keywords,
                'image' => asset('/uploads/video/'.$album->image),
            );  
        }
        
        $pageData = array(
            'seo' => (object) $seo,
            'banner' => $banner,
            'album' => $album,
            // 'events' => $events,
        );
        $data['data'] = (object) $pageData;
        $data = (object) $data;
        return view('gallery-video-detailed', compact('data'));
    }
    public function sendLetter(Request $request){
        $response = [];
        if(isset($request['data']['name'])){
            $record = new Messages;
            $record->name = $request['data']['name'];

            if(isset($request['data']['email'])){
                $record->email = $request['data']['email'];
            }
            if(isset($request['data']['phone'])){
                $record->phone = $request['data']['phone'];
            }
            if(isset($request['data']['message'])){
                $record->message = $request['data']['message'];
            }
            $record->save();
            $response = array(
                'statusCode' => 1
            );
            // Messages
        }
        return $response;
    }
}
