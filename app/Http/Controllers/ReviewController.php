<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }
     
    public function index()
    {
        $segments = request()->segments();
        $type = ucfirst(end($segments));
        $reviews = Review::where('type', '=', $type)->orderBy('updated_at', 'desc')->get();
        return view('review.index', ['reviews' => $reviews, 'type' => $type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $review = new Review();
            $review->title = $request->title;
            $review->type = $request->type;
            $review->review = $request->review;
            $id = Auth::id();
            $review->iduser = $id;
            
            if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
             $file = $request->file('thumbnail');
             $path = $file->getRealPath();
             $image = file_get_contents($path);
             $review->thumbnail = base64_encode($image);
            }
            
            $type = lcfirst($review->type);
            $review->save();
            foreach($request->photos as $photo) {
                $image = new Image();
                $image->saveInStorage($photo, $review->id);
            }
            return redirect('review/' . $type);
        } catch(\Exception $e) {
            return back()->withInput($request->all())->withErrors(
                ['default' => 'Something went wrong']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $type = lcfirst($review->type);
        return view('review.show', ['review' => $review, 'type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('review.edit', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $review->title = $request->title;
        $review->review = $request->review;
        
        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
         $file = $request->file('thumbnail');
         $path = $file->getRealPath();
         $image = file_get_contents($path);
         $review->thumbnail = base64_encode($image);
        }
        
        foreach($review->images as $image) {
            $image->deleteImage($request->toRemove);
        }
        
        if($request->has('photos')) {
            foreach($request->photos as $photo) {
                $image = new Image();
                $image->saveInStorage($photo, $review->id);
            }
        }
        
        try {
            $review->update();
            return redirect('review/' . $review->id);
        } catch(\Exception) {
            return back()->withInput()->withErrors(
                ['default' =>
                'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}