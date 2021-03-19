<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Operation;
use App\Models\OperationClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin){
            $clients = Client::all();
        }else{
            $clients = Auth::user()->client();
        }
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operations = Operation::all();
        return view('clients.create', compact('operations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::create($request->except(['logo_header', 'logo_footer']));
        $client->operations()->sync($request->get('operation_id'));
        /*if ($request->has('operation_id')){

            OperationClient::create([
                'operation_id'  => $request->all()['operation_id'],
                'client_id'     => $client->id,
            ]);
        }*/
        if ($request->hasFile('logo_header')){
            if (Storage::exists('public/clients/'.$client->id.'/logo_header/'.$request->file('logo_header')->getClientOriginalName())){
                Storage::delete('public/clients/'.$client->id.'/logo_header/'.$request->file('logo_header')->getClientOriginalName());
            }
            $request->file('logo_header')->storeAs('public/clients/'.$client->id.'/logo_header/', $request->file('logo_header')->getClientOriginalName());
            $client->logo_header = $request->file('logo_header')->getClientOriginalName();
        }
        if ($request->hasFile('logo_short')){
            if (Storage::exists('public/clients/'.$client->id.'/logo_short/logo_short.svg')){
                Storage::delete('public/clients/'.$client->id.'/logo_short/logo_short.svg');
            }
            $request->file('logo_short')->storeAs('public/clients/'.$client->id.'/logo_short/logo_short.svg');
        }
        if ($request->hasFile('logo_footer')){
            if (Storage::exists('public/clients/'.$client->id.'/logo_footer/'.$request->file('logo_footer')->getClientOriginalName())){
                Storage::delete('public/clients/'.$client->id.'/logo_footer/'.$request->file('logo_footer')->getClientOriginalName());
            }
            $request->file('logo_footer')->storeAs('public/clients/'.$client->id.'/logo_footer/', $request->file('logo_footer')->getClientOriginalName());
            $client->logo_footer = $request->file('logo_footer')->getClientOriginalName();
        }
        if ($request->hasFile('logo_header') || $request->hasFile('logo_footer')){
            $client->save();
        }
        return redirect('/admin/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $operations = Operation::all();
        $operationIds = [];
        foreach ($client->operations()->get() as $operation){
            $operationIds[] = $operation->id;
        }
        return view('clients.edit', compact('client', 'operations', 'operationIds'));
    }

    public function editPivot($client_id, $operation_id)
    {
        $client = Client::find($client_id);
        $pivot = $client->operations->find($operation_id)->pivot;
        $pivot = $pivot->find($pivot->id);
        $operation = $client->operations->find($operation_id);
        return view('clients.edit-pivot', compact('pivot', 'operation', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->except(['logo_header', 'logo_footer', 'logo_short']));
        $client->operations()->sync($request->get('operation_id'));

        if ($request->hasFile('logo_header')){
            if (Storage::exists('public/clients/'.$client->id.'/logo_header/'.$request->file('logo_header')->getClientOriginalName())){
                Storage::delete('public/clients/'.$client->id.'/logo_header/'.$request->file('logo_header')->getClientOriginalName());
            }
            $request->file('logo_header')->storeAs('public/clients/'.$client->id.'/logo_header/', $request->file('logo_header')->getClientOriginalName());
            $client->logo_header = $request->file('logo_header')->getClientOriginalName();
        }
        if ($request->hasFile('logo_short')){
            if (Storage::exists('public/clients/'.$client->id.'/logo_short/logo_short.svg')){
                Storage::delete('public/clients/'.$client->id.'/logo_short/logo_short.svg');
            }
            $request->file('logo_short')->storeAs('public/clients/'.$client->id.'/logo_short/', 'logo_short.svg');
        }
        if ($request->hasFile('logo_footer')){
            if (Storage::exists('public/clients/'.$client->id.'/logo_footer/'.$request->file('logo_footer')->getClientOriginalName())){
                Storage::delete('public/clients/'.$client->id.'/logo_footer/'.$request->file('logo_footer')->getClientOriginalName());
            }
            $request->file('logo_footer')->storeAs('public/clients/'.$client->id.'/logo_footer/', $request->file('logo_footer')->getClientOriginalName());
            $client->logo_footer = $request->file('logo_footer')->getClientOriginalName();
        }
        if ($request->hasFile('favicon')){
            if (Storage::exists('public/clients/'.$client->id.'/favicon/favicon.png')){
                Storage::delete('public/clients/'.$client->id.'/favicon/favicon.png');
            }
            $request->file('favicon')->storeAs('public/clients/'.$client->id.'/favicon/', 'favicon.png');
        }
        if ($request->hasFile('logo_header') || $request->hasFile('logo_footer')){
            $client->save();
        }
        return redirect('admin/client/'.$client->id)->with('status', 'Success');
    }
    public function updatePivot(Request $request, $client_id)
    {
        $client = Client::find($client_id);
        $operation = $client->operations()->wherePivot('id', $request->get('pivot_id'))->first();
        $client->operations()->newPivotStatement()->where('id', $request->all()['pivot_id'])->update([
            'title'         => $request->get('title'),
            'title_color'   => $request->get('title_color'),
            'header_bgc'   => $request->get('header_bgc'),
            'header_color'   => $request->get('header_color'),
            'footer_top_bgc'   => $request->get('footer_top_bgc'),
            'footer_top_color'   => $request->get('footer_top_color'),
            'footer_top_btn_bgc'   => $request->get('footer_top_btn_bgc'),
            'footer_top_btn_color'   => $request->get('footer_top_btn_color'),
            'footer_top_btn_radius'   => $request->get('footer_top_btn_radius'),
            'footer_top_input_radius'   => $request->get('footer_top_input_radius'),
            'footer_bottom_bgc'   => $request->get('footer_bottom_bgc'),
            'footer_bottom_color'   => $request->get('footer_bottom_color'),
            'primary_color'   => $request->get('primary_color'),
            'secondary_color'   => $request->get('secondary_color'),
            'css'           => $request->get('css'),
            'js'            => $request->get('js')
        ]);
        if ($request->hasFile('header_bgi')){
            $request->file('header_bgi')->storeAs('public/'.$operation->shortname.'/images/header_bgi/'.$client->id, $request->file('header_bgi')->getClientOriginalName());
            $client->operations()->newPivotStatement()->where('id', $request->all()['pivot_id'])->update(['header_bgi'  => $request->file('header_bgi')->getClientOriginalName()]);
        }

        if ($request->hasFile('footer_top_bgi')){
            $request->file('footer_top_bgi')->storeAs('public/'.$operation->shortname.'/images/footer_top_bgi/'.$client->id, $request->file('footer_top_bgi')->getClientOriginalName());
            $client->operations()->newPivotStatement()->where('id', $request->all()['pivot_id'])->update(['footer_top_bgi'  => $request->file('footer_top_bgi')->getClientOriginalName()]);
        }
        if ($request->hasFile('footer_bottom_bgi')){
            $request->file('footer_bottom_bgi')->storeAs('public/'.$operation->shortname.'/images/footer_bottom_bgi/'.$client->id, $request->file('footer_bottom_bgi')->getClientOriginalName());
            $client->operations()->newPivotStatement()->where('id', $request->all()['pivot_id'])->update(['footer_bottom_bgi'  => $request->file('footer_bottom_bgi')->getClientOriginalName()]);
        }
        if ($request->hasFile('catalogue')){
            if (Storage::exists('public/'.$operation->shortname.'/catalogue/'.$client->id.'/catalogue.pdf')){
                Storage::delete('public/'.$operation->shortname.'/catalogue/'.$client->id.'/catalogue.pdf');
            }
            $request->file('catalogue')->storeAs('public/'.$operation->shortname.'/catalogue/'.$client->id, 'catalogue.pdf');
        }
        if ($request->hasFile('cover')){
            if (Storage::exists('public/'.$operation->shortname.'/images/covers/'.$client->id.'/cover.png')){
                Storage::delete('public/'.$operation->shortname.'/images/covers/'.$client->id.'/cover.png');
            }
            $request->file('cover')->storeAs('public/'.$operation->shortname.'/images/covers/'.$client->id, 'cover.png');
        }

        return back()->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
