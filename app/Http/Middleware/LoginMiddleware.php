<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DecentralizationRepository;
use App\Services\GetSession;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
           if (Auth::user()->id_role == 3) {
            $company_id = DecentralizationRepository::getDecentralization(Auth::user()->username);
            GetSession::putCompanyId($company_id['company_id']);
        }    
        return $next($request);
        }
        else{
            return redirect('login');
    }
        return $next($request);
    }
}
