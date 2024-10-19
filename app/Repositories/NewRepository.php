<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Http\Request;


class NewRepository
{
    public function getAll()
    {
        return News::all();
    }
    public function getNews($id)
    {
        return News::find($id);
    }
    public function getContent($id)
    {
        return News::where('id',$id)->get();
    }

    public function getImageDetail()
    {
        return News::all();
    }
       /**
     * create a member.
     *
     * @param  \App\Http\Requests\Request $request
     * @param  \App\Models\News $the_name
     * @return void
     */
   public function create($request)
   {
     
       //kiểm tra file tồn tại
      $image="";
      if($request->hasfile('img'))
      {
           $file = $request->file('img');
           $image = time().'_'.$file->getClientOriginalName();
           $destinationPath=public_path('images/news'); //project\public\images/news, //public_path(): trả về đường dẫn tới thư mục public
           $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/images    
      }
      //kiểm tra file tồn tại
      $imgdetail=[];
      if($request->hasfile('img_detail'))
      {
          $file = $request->file('img_detail');
          foreach($file as $key => $files){
           $file_name = time().'_'.$files->getClientOriginalName();
           $destinationPath=public_path('images/news_detail'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
           $files->move($destinationPath, $file_name); //lưu hình ảnh vào thư mục public/image
           $imgdetail[] = $file_name;
       }          
      }
      $the_new = new News();
      $the_new->name=$request->input('name');
      $the_new->content=$request->input('content');
      $the_new->image=$image;
      $the_new->imagedetail=$imgdetail;
      $the_new->save();
      
      
   }

   public function update($request, $id) {

    $image="";
    if($request->hasfile('img'))
    {
         $file = $request->file('img');
         $image = time().'_'.$file->getClientOriginalName();
         $destinationPath=public_path('images/news'); //project\public\images/news, //public_path(): trả về đường dẫn tới thư mục public
         $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/images    
    }
    //kiểm tra file tồn tại
    $imgdetail=[];
    if($request->hasfile('img_detail'))
    {
        $file = $request->file('img_detail');
        foreach($file as $key => $files){
         $file_name = time().'_'.$files->getClientOriginalName();
         $destinationPath=public_path('images/news_detail'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
         $files->move($destinationPath, $file_name); //lưu hình ảnh vào thư mục public/image
         $imgdetail[] = $file_name;
     }          
    }
    
    $the_new = News::find($id);
    $the_new->name=$request->input('name');
    $the_new->content=$request->input('content');
    if($image ==""){
        $image=$the_new->image;
    }
    $the_new->image = $image;
    if($imgdetail == []){
        $imgdetail = $the_new->imagedetail;
    }
    $the_new->imagedetail=$imgdetail;
    $the_new->save();
    
}

public function destroy($id) {
    $the_new = News::find($id);
    $the_new->delete();
  
}


}