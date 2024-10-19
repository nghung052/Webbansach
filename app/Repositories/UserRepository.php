<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {   
        //
    }

    public function getuser($id)
    {
        return User::find($id);
    }
    
    public function create(Request $request)
    {
        $user = new User();
        $user->full_name = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('username');
        $user->password = hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->id_company = $request->input('cate');
        $user->id_role = 2;
        $user->save();
        return redirect(route('user.index'));
       
    }

    public function update(Request $request, $id) 
    {
        if(hash::check($request->password_old, Auth::user()->password)){
            $user = User::find($id);
            $user->password = hash::make($request->input('new_password'));
            $user->save();
            return redirect()->back()->with(['flag'=>'success','messege'=>'Đổi mật khẩu thành công']);
        }   
        return redirect()->back()->with(['flag'=>'danger','messege'=>'Mật khẩu cũ không đúng']);
        
    }

    public function destroy($id) {
      
      
    }

}
