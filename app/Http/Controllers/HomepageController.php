<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(Request $request)
    {
        $newsList = News::with('galleries')->latest()->get();
        return view('home', compact('newsList'));
    }
}
