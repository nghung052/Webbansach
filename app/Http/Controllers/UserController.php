<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePassRequest;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\GetSession;

class UserController extends Controller
{ /**
    * The MemberRepository instance.
    *
    * @var \App\Repositories\UserRepository
    */
   protected $repository;


  /**
   * Create a new PostController instance.
   *
   * @param  \App\Repositories\UserRepository $repository
   */
  public function __construct(UserRepository $repository)
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
        $company_id =  GetSession::getCompanyId();
        $username = Auth::user()->username;
        if ($company_id != '' && Auth::user()->id_role == 2) {
            $user = User::where('id_company', $company_id)
            ->where('username', $username)
            ->orderBy('created_at', 'desc')->paginate(10);
        }
        elseif($company_id != '' && $company_id != 0 && Auth::user()->id_role == 1)
        {
            $user = User::where('id_company', $company_id)
            ->orderBy('created_at', 'desc')->paginate(10);     
        }
        else
        {
        $user = User::where('id_role', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('layout_admin.user.list_users', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('layout_admin.user.create_users', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return $this->repository->create($request);
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
        $user = $this->repository->getuser($id);
        return view('layout_admin.user.proflie',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangePassRequest $request, $id)
    {
        $this->repository->update($request, $id);
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
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function getRole($id)
    {
        $all_role = Role::all();
        $user = $this->repository->getuser($id);
        return view('layout_admin.user.role_users',compact('user','all_role'));
    }

    public function changeRole(Request $request,$id)
    {
        $user = $this->repository->getuser($id);
        $user->id_role = $request->input('cate');
        $user->save();
        return redirect()->back()->with('thongbao','Cập nhật thành công');
    }
}
