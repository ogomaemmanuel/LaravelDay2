<?php
//
//namespace App\Observers;
//
//use App\Blog;
//use App\Mail\BlogObserverMail;
//use Illuminate\Support\Facades\Mail;
//use App\User;
//
//class BlogObserver
//{
//    /**
//     * Handle to the blog "created" event.
//     *
//     * @param  \App\Blog  $blog
//     * @return void
//     */
//    public $user;
//    public function created(Blog $blog)
//    {
//
//              $this->user= User::all()->first();
//        Mail::to($this->user)->queue(new  BlogObserverMail($blog));
////      $this->user= User::all()->first();
////
////      Mail::queue("emails.send",function ($message)
////      {
////          $message->from('eogoma@gmail.com', 'Emmanuel');
////          $message->to($this->user->email);
////          $message->subject("New blog has just been posted");
////      });
////
////      dd("Mail sent");
//
//        //
//    }
//
//    /**
//     * Handle the blog "updated" event.
//     *
//     * @param  \App\Blog  $blog
//     * @return void
//     */
//    public function updated(Blog $blog)
//    {
//        //
//    }
//
//    /**
//     * Handle the blog "deleted" event.
//     *
//     * @param  \App\Blog  $blog
//     * @return void
//     */
//    public function deleted(Blog $blog)
//    {
//        //
//    }
//}
