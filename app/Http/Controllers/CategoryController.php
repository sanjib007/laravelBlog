<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "categoryName" => "required|max:255"
        ]);

        $catagory = new category();

        $catagory->categoryName = $request->categoryName;

        $catagory->save();

        Session::flash('success', 'Insert successfully.');

        return redirect()->route('categories');

       // dd($request->all());
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
        $catagory = category::find($id);
        return view('admin.categories.edit')->with('catagory', $catagory);
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
        $this->validate($request, [
            "categoryName" => "required|max:255"
        ]);

        $catagory = category::find($id);

        $catagory->categoryName = $request->categoryName;

        $catagory->save();

        Session::flash('success', 'Update successfully.');

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catagory = category::find($id);

        foreach ($catagory->posts as $post){
            $post->forceDelete();
        }

        $catagory->delete();

        Session::flash('success', 'delete successfully.');

        return redirect()->route('categories');
    }
}
