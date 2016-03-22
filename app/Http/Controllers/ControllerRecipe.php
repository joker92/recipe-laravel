<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Recipe;
use App\Ingredient;
use App\Http\Requests;
use App\User;
class ControllerRecipe extends Controller

{
    public function search(Request $request){
        //dd($request->search);
        $recipe = Recipe::where('title','like','%'.$request->search.'%')->get();
        return view('recipe/results',compact('recipe'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe=Recipe::orderBy('created_at','DESC')->paginate(8);
         return view ('recipe.index',compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
          $ingredients = Ingredient::lists('name', 'id');
           return view('recipe.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if ( ! $request->has('ingredient_list'))
         {
            $recipe->ingredients()->detach();
            return;
         }
    
        $ingredients = array();
       foreach ($request->ingredient_list as $ingId)
       {
           if (substr($ingId, 0, 4) == 'new:')
           {
               $newIng = Ingredient::create(['name' => substr($ingId, 4)]);
               $ingredients[] = $newIng->id;
               continue;
           }
               $ingredients[] = $ingId;
       }
         
         //dd($request->all());
              $recipe = Auth::user()->recipe()->create($request->all());
         
              $recipe->ingredients()->attach($ingredients);
              
              return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredients = Ingredient::lists('name', 'id');
         return view('recipe.edit',compact('ingredients','recipe'));
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
        $recipe = Recipe::findOrFail($id);
        $input = $request->all();
        
         $recipe->update($input);
         
          if ( ! $request->has('ingredient_list'))
   {
       $recipe->ingredients()->detach();
       return;
   }
    
    $ingredients = array();
   foreach ($request->ingredient_list as $ingId)
   {
       if (substr($ingId, 0, 4) == 'new:')
       {
           $newIng = Ingredient::create(['name' => substr($ingId, 4)]);
           $ingredients[] = $newIng->id;
           continue;
       }
       $ingredients[] = $ingId;
   }
    //dd($request->all());
   
        $recipe->ingredients()->sync($ingredients);
        Session()->flash('flash_message', 'Aggiornato correttamente');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $recipe = Recipe::findOrFail($id);
            $recipe->delete();
                Session()->flash('flash_message_delete', 'Cancellato');
                return redirect()->route('recipe.index');
    }
}
