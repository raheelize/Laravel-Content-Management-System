<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as INPUT;
use DB;
use Session;

class CrudController extends Controller
{
    public function insertData()
    {
        $data = INPUT::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H-i-s');
        DB::table($tbl)->insert($data);
        session::flash('message', 'Data Inserted!');
        return redirect()->back();
    }
    public function updateData()
    {
        $data = INPUT::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H-i-s');

        DB::table($tbl)->where(key($data), reset($data))->update($data);
        session::flash('message', 'Data Updated!');
        return redirect()->back();
    }

    //setting functions
    public function addSettings()
    {
        $data = INPUT::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H-i-s');
        if (INPUT::has('social')) {
            $data['social'] = implode(',', $data['social']);
        }
        if (INPUT::hasFile('logo')) {
            $data['logo'] = $this->uploadImage($tbl, $data['logo']);
        }
        DB::table($tbl)->insert($data);
        session::flash('message', 'Data Updated!');
        return redirect()->back();
    }
    public function updateSettings()
    {
        $data = INPUT::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H-i-s');
        if (INPUT::has('social')) {
            $data['social'] = implode(',', $data['social']);
        }
        if (INPUT::hasFile('logo')) {
            $data['logo'] = $this->uploadImage($tbl, $data['logo']);
        }
        DB::table($tbl)->where(key($data), reset($data))->update($data);
        session::flash('message', 'Data Updated!');
        return redirect()->back();
    }
    public function uploadImage($location, $imagename)
    {
        $name = $imagename->getClientOriginalName();
        $imagename->move(public_path() . '/' . $location, date('ymdgis') . $name);

        return date('ymdgis') . $name;
    }
    //..posts
    public function addpost()
    {
        $data = INPUT::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H-i-s');
        if (INPUT::hasFile('image')) {
            $data['image'] = $this->uploadImage($tbl, $data['image']);
        }
        DB::table($tbl)->insert($data);
        session::flash('message', 'Data Inserted!');
        return redirect()->back();
    }
    public function updatePost()
    {
        $data = INPUT::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H-i-s');
        if (INPUT::hasFile('image')) {
            $data['image'] = $this->uploadImage($tbl, $data['image']);
        }
        DB::table($tbl)->where(key($data), reset($data))->update($data);
        session::flash('message', 'Data Updated!');
        return redirect()->back();
    }
}
