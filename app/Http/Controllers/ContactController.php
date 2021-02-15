<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        /** If CSV don't exist create it*/
        if (!Storage::exists('public/contact.csv')){
            /** Create first row contain keys */
            Storage::put('public/contact.csv', "email;Created at");

            /** Save new line in CSV*/
            Storage::append('public/contact.csv',implode(';', $request->toArray()));

            /** Format content to save in json*/
            $content = json_encode([$request->toArray()]);
            /** Save json content*/
            Storage::put('public/contact.json', $content);

            return 'ok';

        }else{
            /** Get json list*/
            $contactList =  json_decode(Storage::get('public/contact.json'));
            $exist = false;
            /** check if email exist*/
            $email  = $request->all()['email'];
            foreach ($contactList as $contact){
                $value = "";
                if (is_object($contact)){
                    $value = $contact->email;
                }
                if ($email === $value){

                    $exist = true;

                }
            }
            /** Save email il is don't exist*/
            if (!$exist){
                /** Save new line in CSV*/
                Storage::append('public/contact.csv',implode(';', $request->toArray()));
                $contactList[] = $request->toArray();
                Storage::put("public/contact.json", json_encode($contactList));

                return 'ok';
            }else{
                return "exist";
            }
        }

    }
    public function get()
    {
        echo "<a href='".url(Storage::url('contact.csv'))."' download=''>Télécharger le CSV</a>";
    }
}
