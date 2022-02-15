<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Contact;
/* invochiamo la contactMessage.php */
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    // SALVATAGGIO CONTATTI NEL DB E NOTIFICA DELLA MAIL

    public function store(Request $request) { // <- richiesta inviata dalla rotta


        // CHECK VALIDAZIONE
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'message' =>'required',
      ]);

      // se non fallisce
        if( $validator->fails()) {
          return response()->json([
              'errors' => $validator->errors()
          ]); // <- metodo che estrapola dalla validazione che è andato male
        }
    




      $data = $request->all(); // <- qui per estrapolare solo i dati (in questo caso prendiamo tutti quelli che abbiamo lanciato dalla form (nome, email e testo))

        // SALVATAGGIO NEL DB
        $contact = new Contact();
        $contact->fill($data); 
        $contact->save();

      // MAIL
       Mail::to('admin@boolpress.com')->send(new ContactMessage($data));



      return response()->json($data);        /* i dati che lanciamo dalla form arrivano qui nel controller e li impacchetta in formato json per effettuare la chiamata axios, prossimo passo andare a fare l'axios in contact */
    }
}
