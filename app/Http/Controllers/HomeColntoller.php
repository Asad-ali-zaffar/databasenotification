<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserFollowNotification;


class HomeColntoller extends Controller

{
    // public function index(){
    //     $user =User::get();
    //     $post=[
    //         'title'=>'post title',
    //         'slug'=>'post-slug'
    //     ];
    //     // Notification::send($user,new WelcomeNotification($post));
    //     foreach($user as $u){
    //     // Notification::send($u,new WelcomeNotification($post));
        // $u->notify( new WelcomeNotification($post));
    //      }
    //     // dd('done');
    //     return view('welcome');
    // }
    public function index(){


        // dd('done');
        return view('welcome');
    }
    public function notify()
    {
        if(auth()->user())
        {
            $user =User::whereId(2)->first();

            // auth()->user()->notify(new UserFollowNotification($user));
            Notification::send(auth()->user() , new UserFollowNotification($user));
        }

        return redirect('/dashboard');
    }
    public function markasred($id){
        if($id){
            auth()->user()->unreadNotifications->where('id',$id)->markasread();
        }
        return back();
    }
}
