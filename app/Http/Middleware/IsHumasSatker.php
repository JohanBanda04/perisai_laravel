<?php

namespace App\Http\Middleware;

use App\Models\Berita;
use Closure;
use Illuminate\Http\Request;

class IsHumasSatker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->route('getberita')){
            $company = Berita::find($request->route('getberita'));
            if ($company && $company->kode_satker != auth()->user()->kode_satker) {
                return redirect('/');
            }
        }
//        if (!auth()->check() || auth()->user()->roles != 'humas_satker') {
//            abort(403);
//        }
        return $next($request);
    }
}
