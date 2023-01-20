<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
class dummyapi extends Controller
{
    function getData($id=null)
    {
        return $id?movie::find($id):movie::all();
    }

    function addData(Request $req)
    {
        $movie=new movie;
        $movie->title=$req->title;
        $movie->rating=$req->rating;
        $movie->actor=$req->actor;
        $result=$movie->save();
        
        if($result){
            return ["Result"=>"Success"];
        }else{
            return ["Result"=>"Failed!"];
        }
    }

    function update(Request $req){
        $movie = movie::find($req->id);
        $movie->id=$req->id;
        $movie->title=$req->title;
        $movie->rating=$req->rating;
        $movie->actor=$req->actor;
        $result = $movie->save();
        if($result)
        {
            return ["Result"=>"Updated"];
        }
        else{
            return ["Result"=>"Update failed!"];
        }
    }

    function search($name){
        return movie::where("title","like","%".$name."%")->get();
    }
}
