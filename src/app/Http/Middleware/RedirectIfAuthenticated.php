<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guardsのエラーを可変超配列$guardsに詰め込む
        $guards = empty($guards) ? [null] : $guards;

        // 可変超配列$guardsをループする
        foreach ($guards as $guard) {
            // $guardをチェックしてどれかひとつでも認証されているかチェックする
            if (Auth::guard($guard)->check()) {
                // $guardで認証されたものが見つかったら指定のページに遷移する
                return redirect(RouteServiceProvider::HOME);
            }
        }
        // 次のミドルウェアまたはアプリケーションの処理を実行する
        return $next($request);
    }
}
