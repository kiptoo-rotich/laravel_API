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
}
