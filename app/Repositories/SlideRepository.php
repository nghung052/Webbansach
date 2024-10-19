<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {   
        return Slide::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getslide($id)
    {
        return Slide::find($id);
    }
    
    public function create(Request $request)
    {
        $image="";
        if($request->hasfile('img'))
        {
             $file = $request->file('img');
             $image = time().'_'.$file->getClientOriginalName();
             $destinationPath=public_path('images/slide'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
             $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/image        
        }
        $slide = new Slide();
        $slide->title=$request->input('title');
        $slide->description=$request->input('description');
        $slide->status=1;
        $slide->image=$image;
        $slide->save();
       
       
    }

    public function update($request, $id) {
        $image="";
        if($request->hasfile('img'))
        {
             $file = $request->file('img');
             $image = time().'_'.$file->getClientOriginalName();
             $destinationPath=public_path('images/slide'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
             $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/image        
        }
        $slide = Slide::find($id);
        $slide->title=$request->input('title');
        $slide->description=$request->input('description');
        $slide->status=0;
        if($image ==""){
            $image=$slide->image;
        }
        $slide->image=$image;
        $slide->save();
        
    }

    public function destroy($id) {
        $slide = Slide::find($id);
        unlink(public_path('images/slide').'/'.$slide->image);
        $slide->delete();
      
    }

}
