<?php

namespace Hdkhoasgt\DemoPackage\Http\Middleware;

use Closure;
use Hdkhoasgt\DemoPackage\Facades\DemoPackage;
use Hdkhoasgt\DemoPackage\Models\MessageLog;
use Illuminate\Http\Request;

/**
 * Class SaveMessageLog
 * @package Hdkhoasgt\DemoPackage\Http\Middleware
 */
class SaveMessageLog
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $route = \Illuminate\Support\Facades\Route::currentRouteName();
        $message = null;
        if ($route === 'message_logs.hello') {
            $message = DemoPackage::hello($request->route('name'));
        } elseif ($route === 'message_logs.bye') {
            $message = DemoPackage::bye($request->route('name'));
        }
        if ($message !== null) {
            $messageLog = new MessageLog([
                'message' => $message,
            ]);
            $messageLog->save();
        }

        return $next($request);
    }
}