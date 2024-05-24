<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function show(){
        $logo = Image::where('group',1)->first();
        $main_catalogs = Catalog::where('parent_id',0)->get();
        return view('main.auth.login', ['logo'=>$logo, 'main_catalogs'=>$main_catalogs]);}
    }

