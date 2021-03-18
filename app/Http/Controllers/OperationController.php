<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Operation;
use App\Models\Product;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OperationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * Home catalogue avec menu
     * @return \Illuminate\Http\Response
     */
    public function index($ope)
    {
        //
    }

    public function indexCategories(Request $request)
    {
        $operation = Operation::find($request->operation_id);
        $categories = $operation->categories()->get();
        return view('categories.index', compact('operation', 'categories'));
    }

    public function editCategories($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
     public function updateCategories(Request $request, $id)
     {
         $category = Category::find($id);
         $operation = $category->operation()->first();
         $category->update($request->except(['img']));
         if ($request->hasFile('img'))
         {
            if (Storage::exists('public/'.$operation->shortname.'/images/categories/'.$request->file('img')->getClientOriginalName())){
                Storage::exists('public/'.$operation->shortname.'/images/categories/'.$request->file('img')->getClientOriginalName());
            }
            $request->file('img')->storeAs('public/'.$operation->shortname.'/images/categories/', $request->file('img')->getClientOriginalName());
            $category->img = $request->file('img')->getClientOriginalName();
            $category->save();
         }
         return redirect('admin/category?operation_id='.$operation->id)->with('status','Success');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Operation::create($request->all());

        return back()->with('status', 'Ajout réussis');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        $products = Product::where('operation_id', $operation->id)->get();
        foreach ($products as $product) {
            $productData = json_decode($product->data);
            foreach ($productData as $key => $value) {
                $product->$key = $value;
            }
        }
        return view('operations.show', compact('products', 'operation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
