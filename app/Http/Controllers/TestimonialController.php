<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
class TestimonialController extends Controller
{
    public function create() {
        return view('testimonial.create');
    }

    public function store(Request $request) {
        Testimonial::create([
            'content'=>$request->get('content'),
            'name'=>$request->get('name'),
            'profession'=>$request->get('profession'),
            'video_id'=>$request->get('video_id')
        ]);
        return redirect()->back()->with('message', 'Testimonial created sucessfully');

        
    }
}
