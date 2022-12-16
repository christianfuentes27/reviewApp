<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        try {
            $comment = new Comment();
            $comment->message = $request->message;
            $comment->iduser = Auth::id();
            $comment->idreview = $request->reviewdata;
            $comment->save();
            return redirect('review/' . $comment->idreview)->with('message', 'Comment added successfully');
        } catch(\Exception $e) {
            return back()->withInput($request->all())->withErrors(
                ['default' => 'Something went wrong']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        if($comment->iduser == Auth::id()) {
            return view('comment.edit', ['comment' => $comment]);
        }
        
        return back()->withErrors([
                'authorized' =>
                'You cannot edit a review that is not yours'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        try {
            if($comment->iduser == Auth::id()) {
                $comment->update($request->all());
                return redirect('review/' . $comment->idreview)->with('message', 'Comment updated successfully');
            }
            return back()->withErrors([
                'authorized' =>
                'You cannot edit a review that is not yours'
            ]);
        } catch(\Exception) {
            return back()->withInput()->withErrors(
                ['default' =>
                'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            if ($comment->iduser == Auth::id()) {
                $comment->delete();    
                return redirect('review/' . $comment->idreview)->with('message', 'Comment deleted successfully');
            }
        
            return back()->withErrors(['authorized' =>
                'You cannot delete a review that is not yours']); 
        } catch(\Exception $e) {
            return back()->withErrors(
                ['default' => 'Error when deleting']);
        }
    }
}
