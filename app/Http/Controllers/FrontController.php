<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class FrontController extends Controller
{
    public function __construct()
    {
        $categories = DB::table('categories')->where('status','1')->orderby('title')->get();
        $settings = DB::table('settings')->first();
        view()->share([
            'categories' => $categories,
            'settings' => $settings,
        ]);
    }
    public function contribute(){
        return view('frontend.contribute');
    }
    public function subscribe(){
        return view('frontend.subscribe');
    }
    public function archive(){
        return view('frontend.archive');
    }
        
    public function index(){
        $posts = DB::table('posts')->where('status','publish')->inRandomOrder()->get();
        $latest = DB::table('posts')->orderby('created_at','DESC')->limit(5)->get();
        foreach($posts as $post){
            $post->category_id = DB::table('categories')->where('cid',$post->category_id)->value('title');
        }   
        return view('frontend.index', ['posts'=>$posts,'latest'=>$latest,]);
    }  
    public function category($slug){
        $cid = DB::table('categories')->where('slug',$slug)->value('cid');
        if(!$cid){
            return redirect()->back();
        }
        $title = DB::table('categories')->where('slug',$slug)->value('title');
        $latest = DB::table('posts')->where('status','publish')->orderby('created_at','DESC')->get();
        $data=DB::table('posts')->where('category_id',$cid)->where('status','publish')->get();
        // print_r($cid);
        // exit();
        
        return view('frontend.category',['data'=>$data,'category'=>$title, 'latest'=>$latest]);
    }  
    public function post($slug){
        $article=DB::table('posts')->where('slug',$slug)->first();
        if(!$article){
            return redirect()->back();
        }
        $views = $article->views;
        DB::table('posts')->where('slug',$slug)->update(['views'=> $views + 1]);
        $related = DB::table('posts')->where('status','publish')->where('category_id',$article->category_id)->get();
        $category = DB::table('categories')->where('cid',$article->category_id)->first();
        $options = DB::table('posts')->where('status','publish')->inRandomOrder()->limit(3)->get();
        foreach($options as $post){
            $post->category_id = DB::table('categories')->where('cid',$post->category_id)->value('title');
        }
        $contact = $article->author_contact;
        $flag =  Str::contains($contact, '@'); 
        
        $latest = DB::table('posts')->orderby('created_at','DESC')->get();
        $context = [
            'flag'=>$flag,
            'article'=>$article,
            'related'=>$related,
            'category'=>$category,
            'options'=>$options,
            'latest'=>$latest,
        ];
        return view('frontend.article', $context);
    }    
}
