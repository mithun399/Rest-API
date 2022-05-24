<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use Validator;
class dummyapi extends Controller
{
    function insertData(){
       return Vendor::all();
    }

    function getData(Request $req){
        $vendor=new Vendor;
        $vendor->name=$req->name;
        $vendor->address=$req->address;
        $vendor->phone_no=$req->phone_no;
        $vendor->save();
        return ["result"=>"success"];

    }

    function update(Request $req){
        $vendor=Vendor::find($req->id);
        $vendor->name=$req->name;
        $vendor->address=$req->address;
        $vendor->phone_no=$req->phone_no;
        $vendor->save();

        return ["result"=>" update success"];

    }
    function search($name){
        return Vendor::where("name","like","%".$name."%")->get();
    }
    function delete($id){
        $vendor=Vendor::find($id);
        $vendor->delete();
        return ["delete"=>"success"];
    }
    //api validation
    function testData(Request $req){
        $rules=array(
            "name"=>"required",
            "address"=>"required",
            "phone_no"=>"required"
        );
        $validator=Validator::make($req->all(),$rules);
        if ($validator->fails()) {
            # code...
            return $validator->errors();
        }
        else {
            $vendor=new Vendor;
            $vendor->name=$req->name;
            $vendor->address=$req->address;
            $vendor->phone_no=$req->phone_no;
            $vendor->save();
            return ["result"=>"success"];
        }
    }
}
