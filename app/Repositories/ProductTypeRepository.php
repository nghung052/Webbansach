<?php

namespace App\Repositories;

use App\Models\ProductType;

class ProductTypeRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return ProductType::all();
    }

    /**
     * create a member.
     *
     * @param  \App\Http\Requests\ProductTypeRequest $request
     * @param  \App\Models\ProductType $product_type
     * @return void
     */
    public function create($request)
    {
       $product_type = new ProductType();
       $product_type->name=$request->input('name');
       $product_type->save();
       return json_encode((object)['product_type'=>$product_type]);
    }

    /**
     * update a member.
     *
     * @param  \App\Http\Requests\ProductTypeRequest $request
     * @param  \App\Models\ProductType $product_type
     * @return void
     */
    public function update($request) 
    {  
        $product_type = ProductType::find($request->id);
        $product_type->name = $request->input('name');
        $product_type->save();
        return json_encode((object)['product_type'=>$product_type]);
    }



    /**
     * delete a member.
     *
     * @param  \App\Http\Requests\ProductTypeRequest $request
     * @param  \App\Models\ProductType $product_type
     * @return void
     */
    public function destroy($id)
    {
        $product_type = ProductType::find($id);
        $types = $product_type->products;
        $count_products = count($types);
        if($count_products == 0){
            return true;
        }else{
            return false;
        }     
    }
    /**
     * search  member.
     *
     * @param  \App\Http\Requests\ProductTypeRequest $request
     * @param  \App\Models\ProductType $product_type
     * @return void
     */

    public function search($request)
    {

        $search = $request->table_search;
        return ProductType::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })->paginate(10);
    }
}
