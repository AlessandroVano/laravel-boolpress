<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendWelcomeEmail;

class HomeController extends Controller
{
    /**
     * Admin Home
     */

     public function index() {
        /*  return 'QUESTA è LA SEZIONE ADMIN'; */

      // TEST INVIO MAIL

      // VERSIONE A (dati statici)
       /* Mail::to('account@gmail.it')->send(new SendWelcomeEmail()); */


       // VERSIONE B (email utente loggato nel back-end)
     /*   Mail::to(Auth::user())->send(new SendWelcomeEmail()); */
         
     // versione c (passaggio dati a classe -> vista x email)
       Mail::to(Auth::user()->email)->send(new SendWelcomeEmail(Auth::user()->name)); // oggetto della classe welcome che ci setta il nome che abbiamo dato nel costruttore del SendWelcomeEmail.php




        // CARBON

        // DATA ATTUALE - ISTANZA DI CARBON
        $now = new Carbon();
        dump($now);
        dump( $now->toDayDateTimeString() ); /* estrapola giorno e data */
        dump( $now->toDateString() );  /* estrapola solo data */
           
        // DATA DI IERI

        $yesterday = Carbon::yesterday();
       /*  dump($yesterday); */
        dump($yesterday->toDateTimeString() );
        dump($yesterday->format('l') );
        dump($yesterday->format('l d/m/Y') );

        // DATA DI DOMANI

        $tomorrow = Carbon::tomorrow();
        dump($tomorrow->format('l d/m/Y') );

        // CREA DATA CARBON

        $expire = Carbon::create('2050/02/28');
        dump($expire);

        // COMPARAZIONE
        $first = Carbon::create('2021/01/10');
        $second = Carbon::create('2020/01/10');
        dump($first->gt($second) ); // il 2021 è maggiore della data 2020 = true
        dump($first->lt($second) ); // qui sarà false


        // DIFFERENZE IN GIORNI

        $date = Carbon::create('2022/02/06');
        // giorni in relazioni ad oggi
        dump( $date->diffInDays() ); 
         // giorni in relazione a data stabilita
         dump( $date->diffInDays('2022/02/15') ); 

         // TRADUZIONI

   /*       $dt = Carbon::now(); */
         $dt = Carbon::now()->locale('it');
         dump($dt->isoFormat('dddd DD/MM/YYYY')); //  isoFormat serve per la traduzione in locale (documentazione / localization)
         dump($dt->locale() );


         return view('admin.home');
     }
}
