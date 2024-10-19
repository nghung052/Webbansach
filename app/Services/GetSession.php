<?php
namespace App\Services;
use Illuminate\Support\Facades\Session;




class GetSession
{
    public static function getCompanyId()
    {
        return  Session::get('select_companyid');
       
    }

    public static function putCompanyId($company_id)
    {
        Session::put('select_companyid',$company_id);
        //dd($company_id);
    }
    
}