<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateCampingException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  Request
     * @return Response
     */
    public function render($request)
    {
        return response([
            'message' => "input data doesn't meet criteria"
        ]);
    }
}
