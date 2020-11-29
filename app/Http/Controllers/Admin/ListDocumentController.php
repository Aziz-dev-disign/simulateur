<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListDocument;
use App\CategorieList;
use App\TypeSimulation;
use Illuminate\Http\Request;
use App\Http\Requests\ListDocumentFormRequest;

class ListDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titre = 'list des documents à fournir';
        $listDocuments = ListDocument::with(['type','categorie'])->get();
        $categories = CategorieList::all();
        $types = TypeSimulation::all();
        $listDocument = new ListDocument();
        return view('contact.list.index', compact('listDocuments', 'categories', 'types', 'titre', 'listDocument'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListDocumentFormRequest $request)
    {
        ListDocument::create($request->all());
        return redirect()->route('admin.list-document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function show(ListDocument $listDocument)
    {
        return view('contact.list.index',compact('listDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(ListDocument $listDocument)
    {
        $titre = 'Editer: ';
        $categories = CategorieList::all();
        $types = TypeSimulation::all();
        return view('contact.list.edit',compact('listDocument','titre','types','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function update(ListDocumentFormRequest $request, ListDocument $listDocument)
    {
        $listDocument->update($request->all());
        return redirect()->route('admin.list-document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listDocument = ListDocument::find($id);
        $listDocument->delete();
        return redirect()->route('admin.list-document.index');
    }
}
