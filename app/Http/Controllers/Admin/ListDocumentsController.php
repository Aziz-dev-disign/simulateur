<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ListDocuments;
use App\CategorieList;
use App\TypeSimulation;
use App\Http\Requests\ListDocumentFormRequest;

class ListDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = ListDocuments::all();
        return view('contact.list.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categorie = CategorieList::all();
        $type = TypeSimulation::all();
        return view('contact.list.create', compact('categorie','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListDocumentFormRequest $request)
    {
        ListDocuments::create($request->all());
        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListDocuments  $listDocuments
     * @return \Illuminate\Http\Response
     */
    public function show(ListDocuments $listDocuments)
    {
        return view('contact.list.show',compact('listDocuments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListDocuments  $listDocuments
     * @return \Illuminate\Http\Response
     */
    public function edit(ListDocuments $listDocuments)
    {
        return view('contact.list.edit',compact('listDocuments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListDocuments  $listDocuments
     * @return \Illuminate\Http\Response
     */
    public function update(ListDocumentFormRequest $request, ListDocuments $listDocuments)
    {
        ListDocuments::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListDocuments  $listDocuments
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListDocuments $listDocuments)
    {
        $listDocuments->delete();
        return redirect()->route('');
    }
}
