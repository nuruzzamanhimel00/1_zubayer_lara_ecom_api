<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id','desc')->get();
        if(!is_null($categories)){
            return response()->json([
                'status' => 'success',
                'data' => $categories
            ]);
        }
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
            'category_name' => 'required|unique:categories',
            'category_description' => 'required',
             'publication_status' => 'required',
        ]);

        // $category =  Category::create([
        //     'category_name' => $request->category_name,
        //       'category_description' => $request->category_description,
        //         'publication_status' => $request->publication_status,
        // ]);

           $category = new Category;
           $category->fill($request->all());


        if($category->save()){
             return response()->json([
            'status' => 'success',
            'data' => $request->all()
           ]);
        }

         
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('id',$id)->first();

        if(!is_null($categories)){
            return response()->json([
                'status' => 'success',
                'data' => $categories
            ]);
        }
    
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
         $categories = Category::where('id',$id)->update($request->all());

        if(!is_null($categories)){
            return response()->json([
                'status' => 'success',
               
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category_dlt = Category::where('id',$id)->delete();

        if(!is_null($category_dlt)){
            return response()->json([
                'status' => 'success',
               
            ]);
        }
         // return response()->json([
         //        'status' => $id
               
         //    ]);
    }
}
