<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $socialLinks = SocialLink::where('enabled', true)->orderBy('order')->get();
        return view('root', [
            'socialLinks' => $socialLinks,
        ]);
    }
}
