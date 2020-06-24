<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller {
     //
    public function getExample(Request $request) {
        $response = array(
            'example' => $request->header("X-Example"),
        );
        return $this->generateSuccessResponse($response);
    }
}
