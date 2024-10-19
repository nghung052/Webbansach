<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewRepository;
use App\Models\News;

class NewsController extends Controller
{
 /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\NewRepository
     */
    protected $repository;


   /**
    * Create a new PostController instance.
    *
    * @param  \App\Repositories\NewRepository $repository
    */
   public function __construct(NewRepository $repository)
   {
       $this->repository = $repository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $the_news = $this->repository->getAll();
        //$image_detail = count($the_news->imagedetail);
        return view('layout_admin.thenew.list_new', compact('the_news'));
    }

    public function getDetail($id)
    {
     
        $new_content = $this->repository->getContent($id);
        return view('layout_admin.thenew.content', compact('new_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.thenew.create_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request);
        return redirect(route('thenews.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $the_news = $this->repository->getNews($id);
        return view('layout_admin.thenew.edit_new', compact('the_news'));
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
        $this->repository->update($request, $id);
        return redirect(route('thenews.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->back();
    }

    public function getOnNews($id){
        $on= News::find($id);
        $on->status = News::statusOn;
        $on->save();
        return redirect()->back();
    }

    public function getStopNews($id){
        $off=News::find($id);
        $off->status = News::statusOff;
        $off->save();
        return redirect()->back();
    }

}
