<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home(){

        return view('home');
    }

    // Trial
    public function trial(){

        return view('trial');
    }

    // About
    public function pricing(){

        return view('pricing');
    }

    // About
    public function about(){

        return view('about');
    }
    // Blog
    public function blog(){

        return view('blog.index');
    }

    public function single(){

        return view('blog.single');
    }

    // Typo
    public function typo(Request $request){

        // Get the subdomain from the URL
        $host = $request->get('esika');
        $subdomain = explode('.', $host)[0]; // Extract the first part before the first dot

        return view('errors.typo', compact('host', 'subdomain'));
    }
}
