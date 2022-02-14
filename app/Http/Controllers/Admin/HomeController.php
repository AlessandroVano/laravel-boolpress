<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Admin Home
     */

     public function index() {
        /*  return 'QUESTA è LA SEZIONE ADMIN'; */


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
