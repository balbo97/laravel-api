<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // recupero i dati dalla request 
        $form_data = $request->all();

        $category = new Category;

        // definisco lo slug 
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;

        // riempio gli altri campi con la funzione fill()
        $category->fill($form_data);

        // salvo l'istanza 
        $category->save();

        // faccio redirect alla pagina index
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $form_data = $request->all();

        // controllo che il nome sia unico 
        $exists = Category::where('name', 'LIKE', $form_data['name'])->where('id', '!=', $category->id)->get();
        if (count($exists) > 0) {
            $error_message = 'La categoria selezionata è gia esistente!';
            return redirect()->route('admin.categories.edit', ['category' =>  $category->slug], compact('error_message'));
        }

        // definisco lo slug
        $slug = Str::slug($form_data['name'], '-');

        $form_data['slug'] = $slug;

        // riempio i campi con la funzione update 
        $category->update($form_data);

        // redirect alla pagina index 
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $category->delete();
        
        // elimino tutte le relazioni con i progetti 
        $category->projects()->delete();
        
        // elimino la categoria 
        $category->delete();
        
        // reindirizzo alla index
        return redirect()->route('admin.categories.index');
    }
}
