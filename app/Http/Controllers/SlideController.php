<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SlideRepository;
use App\Models\Slide;

class SlideController extends Controller
{   /**
    * The ProductRepository instance.
    *
    * @var \App\Repositories\SlideRepository
    */
   protected $repository;


  /**
   * Create a new PostController instance.
   *
   * @param  \App\Repositories\SlideRepository $repository
   */
  public function __construct(SlideRepository $repository)
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
        $slide = $this->repository->getAll();
        return view('layout_admin.slide.list_slide', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.slide.create_slide');
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
        return redirect(route('slide.index'));
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
        $slide = $this->repository->getslide($id);
        return view('layout_admin.slide.edit_slide', compact('slide'));
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
        return redirect(route('slide.index'));
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
        return redirect(route('slide.index'));
    }
    public function getOn($id){
        $on=Slide::find($id);
        $on->status = Slide::statusOn;
        $on->save();
        return redirect()->back();
    }

    public function getOff($id){
        $off=Slide::find($id);
        $off->status = Slide::statusOff;
        $off->save();
        return redirect()->back();
    }
}
