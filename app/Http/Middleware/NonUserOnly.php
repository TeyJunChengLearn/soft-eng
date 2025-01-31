<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NonUserOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth::user();
        if (Auth::check()) {
            if($user->manager->status==false && $user->medicalStaff->status==false && $user->admin->status==false&&$user->caretaker->status==false){
                return redirect()->route("selectRole.index");
            }else if($user->medicalStaff->status==true){
                if($user->medicalStaff->vet_id==null){
                    return redirect()->route('medicalStaff.saveID.index');
                }
                return redirect()->route('medicalStaff.healthRecord.sanctuaryList');
            }else if($user->caretaker->status==true){
                if($user->caretaker->manager_id==null){
                    return redirect()->route('caretaker.joinManager.index');
                }
                return redirect()->route('caretaker.catActivity.sanctuaryList');
            }else if($user->manager->status==true){
                return redirect()->route('manager.catRecord.sanctuaryList');
            }else if($user->admin->status==true){
                return redirect()->route('admin.dashboard');
            }
        }
        return $next($request);
    }
}
