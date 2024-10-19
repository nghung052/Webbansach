<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GetSession;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function getCompanyIdSession(Request $request)
    {
        if($request->select_companyid == null){
            GetSession::putCompanyId('0');
            $company = $request->session()->get('select_companyid', '');
        }
        else
        {
            GetSession::putCompanyId($request->select_companyid);
            $company = $request->session()->get('select_companyid', '');
        }
        if ($company != '') {
            if (Auth::user()->id_role == 1) {
                return redirect('admin');
            } elseif (Auth::user()->id_role == 2) {
                return redirect(route('book.index'));
            }
        } else {
            if (Auth::user()->admin_system == 1) {
                return redirect('index');
            } elseif (Auth::user()->admin_system == 2) {
                return redirect(route('index'));
            }
        }
   }
}
