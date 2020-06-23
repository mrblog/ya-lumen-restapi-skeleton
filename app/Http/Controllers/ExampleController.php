<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function getExample(Request $request) {
        $response = array(
            'example' => $request->header("X-Example"),
        );
        return $this->generateSuccessResponse($response);
    }
}
