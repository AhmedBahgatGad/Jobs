<?php
   namespace App\Http\Middleware;

   use Closure;
   use Illuminate\Support\Facades\Auth;
   
   class CheckAdmin
   {
       public function handle($request, Closure $next)
       {
           // Ensure user is authenticated
           if (Auth::check()) {
               // Check user role
               if (Auth::user()->role === 'admin') {
                   return $next($request);
               }
           }
   
           // Redirect if not authenticated or not an admin
           return redirect()->route('home')->with('error', 'Access denied. Admins only.');
       }
   }
?>