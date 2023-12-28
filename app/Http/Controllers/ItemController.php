<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Local;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoItem;
use App\Models\Arquivo;
use App\Models\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Exibe a lista de itens.
     */
    public function index()
    {
        return view("itens.index", ['itens' => Item::with(['local', 'material'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locais = Local::orderBy('nome', 'asc')->get();
        $materiais = Material::orderBy('nome', 'asc')->get();

        return view(
            'itens.create',
            [
                'locais' => $locais,
                'materiais' => $materiais,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidacaoItem $request)
    {
        $file = $request->file('foto');
        $item = Item::create($request->all());

        if ($file) {
            $path = $file->storeAs('public/img', $file->hashName());

            Storage::setVisibility($path, 'public');

            Arquivo::create([
                'item_id' => $item->id,
                'path' => $path,
            ]);
        }
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('itens.edit', [
            'item' => $item,
            'materiais' => \App\Models\Material::all(),
            'locais' => \App\Models\Local::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidacaoItem $request, Item $item)
    {
        $file = $request->file('foto');
        if ($file) {
            if (Storage::exists($item->arquivo->path)) {
                $arq = Arquivo::find($item->arquivo->id);
                Storage::delete($item->arquivo->path);
                $path = $file->storeAs('public/img', $file->hashName());
                $arq->path=$path;
                $arq->save();
                $item->update($request->all());
                Storage::setVisibility($path, 'public');
                return back();
            } {
                $path = $file->storeAs('public/img', $file->hashName());
                $arq = Arquivo::where('item_id', $item->id)->get();
                $arq->path = $path;
                $item->update($request->all());
                Storage::setVisibility($path, 'public');
                return back();
            }
        } else {
            $item->update($request->all());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try {
            $item->delete();
            return back();
        } catch (\Throwable $th) {
            return back();
        }
    }
}
