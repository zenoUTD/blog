<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

        class MailController extends Controller
        {
          public function basic_email() {
            $data = array('name'=>"Blog Application");

            Mail::send(['text'=>'mail'], $data, function($message) {
               $message->to('zwelinnhtetag@gmail.com', 'Zwel')->subject
                  ('Basic Testing Mail');
               $message->from('laravel.itvisionhub@gmail.com','Blog Application');
            });
            echo "Basic Email Sent. Check your inbox.";
         }

         public function html_email() {
             $data = array('name'=>"Blog Application");
             Mail::send('mail', $data, function($message) {
                $message->to('zwelinnhtetag@gmail.com', 'Zwel')->subject
                   ('HTML Testing Mail');
                $message->from('laravel.itvisionhub@gmail.com','Blog Application');
             });
             echo "HTML Email Sent. Check your inbox.";
          }

         //  public function attachment_email() {
         //
         //    $data = array('name'=>"Blog Application");
         //    Mail::send('mail', $data, function($message) {
         //       $message->to('zwelinnhtetag@gmail.com', 'Zwel')->subject
         //          ('Testing Mail with Attachment');
         //       $message->attach(asset('/img/itvisionhub_logo.png'));
         //       $message->from('laravel.itvisionhub@gmail.com','Blog Application');
         //    });
         //    echo "Email Sent with attachment. Check your inbox.";
         // }
}
