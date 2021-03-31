<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Operation;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $clients = Client::all();
        return view('contacts.index', compact('clients'));
    }
    public function show($id)
    {
        $client = Client::find($id);
        $operation = Operation::find(\request()->get('operation'));
        $contacts = [];
        if (Storage::exists('public/'.$operation->shortname.'/contacts/'.$client->id. '/contact.json')){
            $contacts  = json_decode(Storage::get('public/'.$operation->shortname.'/contacts/'.$client->id. '/contact.json'));
        }
        $file = \url('storage/'.$operation->shortname.'/contacts/'.$client->id. '/contact.csv');
        return view('contacts.show', compact('client', 'operation', 'contacts', 'file'));
//        $filename = Storage::url($operation->shortname.'/contacts/'.$client->id. '/contact.csv');
        $url = \Illuminate\Support\Facades\URL::temporarySignedRoute(
            'getcontact', now()->addMinutes(30), ['operation'=> $operation->id, 'client' => $client->id]
        );
        echo "<label for='lien'>Lien:</label><input style='width: 100%' type='text' disabled value='".$url."'> <a href='".$url."' >Télécharger le CSV</a>";
//        return response()->download($url);

    }
    public function store(Request $request)
    {
        /** If CSV don't exist create it*/
        if (!Storage::exists('public/' . \request('ope') . '/contacts/' . \request('client') . '/contact.csv')){
            /** Create first row contain keys */
            Storage::put('public/' . \request('ope').'/contacts/' . \request('client') . '/contact.csv', "email;Created at");

            /** Save new line in CSV*/
            Storage::append('public/' . \request('ope') . '/contacts/' . \request('client') . '/contact.csv', implode(';', $request->toArray()));

            /** Format content to save in json*/
            $content = json_encode([$request->toArray()]);
            /** Save json content*/
            Storage::put('public/' . \request('ope') . '/contacts/' . \request('client') . '/contact.json', $content);

            return 'ok';

        }else{
            /** Get json list*/
            $contactList =  json_decode(Storage::get('public/' .\request('ope') . '/contacts/' . \request('client') . '/contact.json'));
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
                Storage::append('public/' . \request('ope') . '/contacts/' . \request('client') . '/contact.csv',implode(';', $request->toArray()));
                $contactList[] = $request->toArray();
                Storage::put("public/contact.json", json_encode($contactList));

                return 'ok';
            }else{
                return "exist";
            }
        }

    }
   /* public function get()
    {
        $client = Client::find(\request('client'));
        $operation = Operation::find(\request()->get('operation'));
        $file = \url('storage/'.$operation->shortname.'/contacts/'.$client->id. '/contact.csv');
        return response()->download($file);
    }*/
}
