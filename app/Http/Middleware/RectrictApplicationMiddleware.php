<?php

namespace App\Http\Middleware;

use App\Models\Application;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RectrictApplicationMiddleware
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
        if (Auth::check()) {

            if (Application::where('user_id', auth()->user()->id)->latest()->exists()) {
                $lastInsert = Application::where('user_id', auth()->user()->id)->latest()->firstOrFail();
                $interval = $lastInsert->created_at->diff(now());

                if ($lastInsert->exists() and $interval->d > 1) {
                    return $next($request);
                }

                return redirect()->back()->with('message', "Вы добавили заявку $interval->h часа $interval->i минут $interval->s секунд назад для добавления заявки должно пройти 24 часа !");

            }

            return $next($request);

        }

        return abort(404);

    }
}
