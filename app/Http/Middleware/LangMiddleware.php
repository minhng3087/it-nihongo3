<?php 
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
class LangMiddleware
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
        $language = \Session::get('lang', config('app.locale'));
    // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config

    config(['app.locale' => $language]);
    // Chuyển ứng dụng sang ngôn ngữ được chọn

    return $next($request);
    }
}