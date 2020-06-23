<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TokenController extends Controller {

    public function getToken(Request $request) {
        $apiKey = $request->header("X-Api-key");
        if (!empty($apiKey) && strlen($apiKey) > 7) {
            $response = array(
                'token' => "3eef2488c6b0eebb8945175b5e75f401"
            );
            return $this->generateSuccessResponse($response);
        } else {
            return $this->generateErrorResponse("Invalid", 403);
        }
    }

}
