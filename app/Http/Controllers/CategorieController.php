<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Categorie::all();
        return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieRequest $categorieRequest,)
    {
        Categorie::Create($categorieRequest->all());
        return redirect(url('/painel'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show',['categorie'=>$categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.edit',['categorie'=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieRequest $categorieRequest, Categorie $categorie)
    {
        $categorie->update($categorieRequest->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Categorie $categorie)
    {
        $categorie->delete();
        return back();
    }
}
