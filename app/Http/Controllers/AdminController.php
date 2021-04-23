<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Request as INPUT;
use Session;
class AdminController extends Controller
{
    public function index(){
        //$admin_name = DB::table('users')->
        return view('backend.index');
    }
    public function categories(){
        $data = DB::table('categories')->orderby('title')->get();
        return view('backend.categories.category',['data'=> $data,]);
    }
    public function editCategory($id){
        $singleData = DB::table('categories')->where('cid',$id)->first();
        if($singleData == NULL){
            return redirect("admin/category");
        }
        $data = DB::table('categories')->get();
       
        return view('backend.categories.edit_category',['data'=>$data, 'singleData'=>$singleData]);

    }
    public function deleteData(){
        $data = INPUT::except('_token');
        if($data['bulk-action']==0){
            session::flash('message', 'Please Select An Action to Perform!');
            return redirect()->back();
        }
        // print_r($data);
        // exit();
        if(empty($data['select-data'])){
            session::flash('message', 'Please Select Any Category!');
            return redirect()->back();
        }
        //deleting the categories now!!
        $tbl = decrypt($data['tbl']);
        $tblid = decrypt($data['tblid']);
        $ids = $data['select-data'];
        //print_r($ids);
        foreach($ids as  $id){
            DB::table($tbl)->where($tblid,$id)->delete();

        }
        session::flash('message', 'Selected Data is Deleted!');
            return redirect()->back();
    } 
    
    //settings fucntions
    public function settings(){
        $data = DB::table('settings')->first();
        if($data){
            $data->social = explode(',',$data->social);
            // print_r($data->social);
            // exit();
        }
        return view('backend.settings',['data'=>$data,]);
    }
    //post funtions
    public function viewAllPost(){
        
        $posts = DB::table('posts')->orderby('pid','DESC')->paginate(100);
        $published =  DB::table('posts')->where('status','publish')->count();
        foreach($posts as $post){
            $post->category_id = DB::table('categories')->where('cid',$post->category_id)->value('title');
        }
        return view('backend.posts.all-post',['posts'=>$posts,'published'=>$published]);
    }
    public function addPost(){
        $categories = DB::table('categories')->orderby('title')->get();
        return view('backend.posts.add-post', ['categories'=>$categories,]);
    }
    public function editPost($id){
        $categories = DB::table('categories')->orderby('title')->get();
        $data = DB::table('posts')->where('pid',$id)->first();
        $checked = DB::table('categories')->where('cid',$data->category_id)->value('cid');
        return view('backend.posts.edit-post',['data'=>$data, 'categories'=>$categories,'checked'=>$checked,]);
    }
}
