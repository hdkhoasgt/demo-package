<?php

namespace Hdkhoasgt\DemoPackage\Http\Controllers;

use Hdkhoasgt\DemoPackage\Facades\DemoPackage;
use Illuminate\Http\Request;

/**
 * Class MessageLogController
 * @package Hdkhoasgt\DemoPackage\Http\Controllers
 */
class MessageLogController extends Controller
{
    /**
     * @param Request $request
     * @param null $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function hello(Request $request, $name = null)
    {
        $data = [
            'message' => DemoPackage::hello($name),
        ];
        return view('demo-package::message_logs.hello', $data);
    }

    /**
     * @param Request $request
     * @param null $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function bye(Request $request, $name = null)
    {
        $data = [
            'message' => DemoPackage::bye($name),
        ];
        return view('demo-package::message_logs.bye', $data);
    }
}
