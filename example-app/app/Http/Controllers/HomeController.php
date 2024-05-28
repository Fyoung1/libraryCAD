<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;


class HomeController extends Controller
{
    public function index()
    {
        $Books=book::all();
        return view('page.index',compact('Books'));
    }
}
