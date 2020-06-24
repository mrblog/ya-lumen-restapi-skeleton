<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TokenController extends Controller {

    private function validateApiKey($apiKey) {
        // add your code here to validate the passed API Key
        // this demo simply accepts any API key 8 chars or more
        return (!empty($apiKey) && strlen($apiKey) > 7);
    }

    private function generateToken($apiKey) {
        if ($this->validateApiKey($apiKey)) {
            // add your code here to generate a token from the API key
            // this demo just generates a random token
            $response = array(
                'token' => uniqid()
            );
            return $this->generateSuccessResponse($response);
        } else {
            return $this->generateErrorResponse("Invalid", 403);
        }
    }

    public function getToken(Request $request) {
        $apiKey = $request->header("X-Api-key");
        return $this->generateToken($apiKey);
    }

}
