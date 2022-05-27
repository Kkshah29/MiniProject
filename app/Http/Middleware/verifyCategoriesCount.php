<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class verifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Category::all()->count()
        if(Category::count() === 0){
            session()->flash('error', 'Minimum one category must exist to create a post!');
            return redirect(route('categories.create'));
        } 
        return $next($request);
    }//next is to register tha middleware
}
