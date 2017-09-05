<?php

namespace App\Middleware;

class TrackingCookieMiddleware
{
    public function __invoke($request, $response, $next)
    {
        // $next() を呼ぶことで、アプリケーションのキューの中で
        // *次の* ミドルウェアにコントロールを任せます。
        $response = $next($request, $response);

        // レスポンスを変更する時には、 next を呼んだ *後に*
        // それを行うべきです。
        if (!$request->getCookie('landing_page')) {
            $response->cookie([
                'name' => 'landing_page',
                'value' => $request->here()/*,
                'expire' => '+ 1 year',*/
            ]);
        }
        return $response;
    }
}