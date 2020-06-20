<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait{

    public function apiException($request,$exception)
    {
        if($exception instanceof ModelNotFoundException)
        {
            return response()->json([
                'errors' => "Product Model Not Found"
            ],Response::HTTP_NOT_FOUND);
        }

        if($exception instanceof NotFoundHttpException)
        {
            return response()->json([
                'errors' => "Incorrect Route"
            ],Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }

}
