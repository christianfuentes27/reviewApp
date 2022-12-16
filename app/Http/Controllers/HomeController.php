<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index', ['user' => Auth::user()]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($user->id == Auth::id()) {
            return view('user.edit', ['user' => $user]);
        } else {
            return back()->withErrors([
                'authorized' =>
                'You cannot edit a user that is not yours'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        try {
            if($user->id == Auth::id()) {
                $user->update($request->all());
            } else {
                return back()->withErrors([
                    'authorized' =>
                    'You cannot update a user that is not yours'
                ]);
            }
            return redirect('user')->with('message', 'User updated successfully');
        } catch(\Exception) {
            return back()->withInput()->withErrors(
                ['default' =>
                'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            if ($user->id == Auth::id()) {
                foreach($user->reviews as $review) {
                    foreach($review->images as $image) {
                        $image->deleteFromStorage();
                    }
                }
                $user->delete();
            } else {
              return back()->withErrors(['authorized' =>
                'You cannot delete a user that is not yours']);
            }
            
            return redirect('/')->with('message', 'User deleted successfully');
        } catch(\Exception $e) {
            return back()->withErrors(
                ['default' => 'Error when deleting']);
        }
    }
    
    function logout() {
        Auth::logout();
        return redirect('/')->with('message', 'Log out complete');
    }
}
