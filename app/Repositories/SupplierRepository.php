<?php

namespace App\Repositories;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {   
        return Supplier::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getsupplier($id)
    {
        return Supplier::find($id);
    }

    public function create(Request $request)
    {
        //kiểm tra file tồn tại
       $image="";
       if($request->hasfile('img'))
       {
            $file = $request->file('img');
            $image = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images/users'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/image        
       }
       $supplier = new Supplier();
       $supplier->name=$request->input('name');
       $supplier->email=$request->input('email');
       $supplier->address=$request->input('address');
       $supplier->phone=$request->input('phone');
       $supplier->image=$image;
       $supplier->save();
       
    }

    public function update($request, $id) {
        $image="";
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $image=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images/users'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/image
        }
        $supplier = Supplier::find($id);
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->address=$request->input('address');
        $supplier->phone=$request->input('phone');
        if($image==""){
            $image=$supplier->image;
        }
        $supplier->image=$image;
        $supplier->save();
        
    }

    public function destroy($id) {
        $supplier = Supplier::find($id);
        unlink(public_path('images/users').'/'.$supplier->image);
        $supplier->delete();
      
    }

    public function search($request) {

        $search = $request->table_search;
        return Supplier::where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('phone', 'like', "%$search%");
            })->paginate(10);
    }

}
