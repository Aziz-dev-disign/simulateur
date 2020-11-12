<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\CategorieList;
use Illuminate\Http\Request;

class CategorieListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategorieList::all();
        return view('contact.categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return vies('contact.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CategorieList::create($request->all());
        return redirect()-route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieList $categorieList)
    {
        return view('contact.categorie.show', compact('categorieList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorieList $categorieList)
    {
        return view('contact.categorie.create', compact('categorieList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieList $categorieList)
    {
        CategorieList::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieList $categorieList)
    {
        $categorieList->delete();
        return redirect()->route('');
    }
}
