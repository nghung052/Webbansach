<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BillRepository;
use App\Models\Bill;

class BillController extends Controller
{  /**
    * The ProductRepository instance.
    *
    * @var \App\Repositories\BillRepository
    */
   protected $repository;


  /**
   * Create a new PostController instance.
   *
   * @param  \App\Repositories\BillRepository $repository
   */
  public function __construct(BillRepository $repository)
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
        $bill = $this->repository->getAll();
        return view('layout_admin.bookbill.list_bill',compact('bill'));
    }
    public function NotReceived()
    {
        $bill = $this->repository-> getAllNotReceiving();
        return view('layout_admin.bookbill.order_not_received',compact('bill'));
    }
    public function  Received()
    {
        $bill = $this->repository-> getAllReceiving();
        return view('layout_admin.bookbill.order_received',compact('bill'));
    }

    public function Complete()
    {
        $bill = $this->repository-> getAllComplete();
        return view('layout_admin.bookbill.order_complete',compact('bill'));
    }

    public function Fails()
    {
        $bill = $this->repository-> getAllFail();
        return view('layout_admin.bookbill.order_fail',compact('bill'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('layout_admin.bookbill.detail_bill');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getProcessing($id){
        $xl = Bill::find($id);
        $xl->status = Bill::processing;
        $xl->save();
        return redirect()->back();
    }

    public function getReceiving($id){
        $tn = Bill::find($id);
        $tn->status = Bill::receiving;
        $tn->save();
        return redirect()->back();
    }

    public function getDelivered($id){
        $dg = Bill::find($id);
        $dg->status = Bill::delivered;
        $dg->save();
        return redirect()->back();
    }
    public function getFail($id){
        $tb = Bill::find($id);
        $tb->status = Bill::fail;
        $tb->save();
        return redirect()->back();
    }
}