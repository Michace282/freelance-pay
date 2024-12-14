<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function howItWorks()
    {
        return view('pages.how-it-works');
    }

    public function forWhom()
    {
        return view('pages.for-whom');
    }

    public function certificates()
    {
        return view('pages.certificates');
    }

    public function reviews()
    {
        return view('pages.reviews');
    }

    public function performers()
    {
        return view('pages.performers');
    }

    public function clients()
    {
        return view('pages.clients');
    }
    public function rules()
    {
        return view('pages.rules'); 
    }
}
