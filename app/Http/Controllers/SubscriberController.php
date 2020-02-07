<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscriber;

use Mail;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // Available alpha caracters
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      // generate a pin based on 2 * 7 digits + a random character
      $pin =  mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)]
            . mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)];

      // shuffle the result
      $confirmation_code = str_shuffle($pin);

      Subscriber::create(['name'=>$request->name,'email'=>$request->email,'confirmation_code'=>$confirmation_code]);

      $data = array('email'=>$request->email,'name'=>$request->name,"confirmation_code"=>$confirmation_code);


      Mail::send('mail.confirmation_mail', $data, function($message) use ($request) {
         $message->to($request->email,$request->name)->subject
            ('Subscription Confirmation Mail');
         $message->from('laravel.itvisionhub@gmail.com','ITVisionHub Feed Zone');
      });

      echo "Check your mail";

    //  return redirect()->route('blog-posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mail_confirmation()
    {
      return view('mail.confirmation');
    }

    public function confirmation(Request $request){
      $confirmation_code = $request->digit1.$request->digit2.$request->digit3.$request->digit4.$request->digit5.$request->digit6;

      $subscriber = Subscriber::where('confirmation_code', '=', $confirmation_code)->first();
      if ($subscriber === null) {
        echo "Fail";
         // user doesn't exist
      }

      else {
        $data = array('email'=>$subscriber->email,'name'=>$subscriber->name);

        Mail::send('mail.confirmation_success', $data, function($message) use ($subscriber) {
           $message->to($subscriber->email,$subscriber->name)->subject
              ('Subscription Success');
           $message->from('laravel.itvisionhub@gmail.com','ITVisionHub Feed Zone');
        });

        echo "Check your mail";
      }


    }
}
