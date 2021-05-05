<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Post;
use App\Property;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $slider = Property::orderBy('id', 'DESC')->take(3)->get();
        $post = Post::orderBy('id', 'DESC')->take(3)->get();
        $property = Property::orderBy('id', 'DESC')->take(6)->get();
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('index', compact('slider', 'property', 'post', 'properti', 'blog'));
    }

    public function properties()
    {
        $property = Property::orderBy('id', 'DESC')->get();
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('properties', compact('property', 'properti', 'blog'));
    }

    public function detail_properties($slug)
    {
        $property = Property::where('slug', $slug)->first();
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('detail-properties', compact('property', 'properti', 'blog'));
    }

    public function blog()
    {
        $post = Post::orderBy('id', 'DESC')->get();
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('blog', compact('post', 'properti', 'blog'));
    }

    public function detail_blog($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('detail-blog', compact('post', 'properti', 'blog'));
    }

    public function filter(Request $request)
    {
        $wer = "";

        if($request->tipe) {

            $tipe = $request->tipe;

            if($tipe == 'Rumah') {
                $tipe = 1;
            } elseif($tipe == 'Apartement') {
                $tipe = 2;
            } elseif($tipe == 'Kavling') {
                $tipe = 3;
            }

            $wer .= " properties.tipe = '$tipe'";

        }

        if($request->status) {

            $status = $request->status;

            if($status == 'New') {
                $status = 1;
            } elseif($status == 'Eksklusif') {
                $status = 2;
            }   

            $wer .= " AND properties.status = '$status'";

        }

        if($request->lokasi) {
            $wer .= " AND properties.lokasi LIKE '%$request->lokasi%'";
        }

        if($request->min) {
            $wer .= " AND properties.harga >= '$request->min'";
        }

        if($request->max) {
            $wer .= " AND properties.harga <= '$request->max'";
        }

        $data = Property::orderBy('created_at', 'DESC')->whereRaw($wer)->get();

        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();

        return view('filter', compact('data', 'properti', 'blog'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data = Post::where('title', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->get();
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();

        return view('search', compact('data', 'properti', 'blog', 'keyword'));
    }

    public function contact()
    {
        $properti = Property::orderBy('id', 'DESC')->take(3)->get();
        $blog = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('contact', compact('properti', 'blog'));
    }

    public function addContact(Request $request)
    {
        Contact::create($request->all());
        return redirect('/contact')->with('status', 'Pesan Sudah Terkirim');
    }
}
