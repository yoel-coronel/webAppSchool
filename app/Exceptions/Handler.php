<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
     use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    /*public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }*/
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {

            return $this->convertValidationExceptionToResponse($exception, $request);
        }
        if ($exception instanceof ModelNotFoundException) {

            $modelo = class_basename($exception->getModel());
            return $this->errorResponse("No existe ninguna instancia de {$modelo} con el id especificado",1,404);
        }
        // if ($exception instanceof AuthenticationException) {

        //     return $this->unauthenticated($request, $exception);

        // }
        if ($exception instanceof AuthorizationException) {

            return $this->errorResponse("No posee permisos para ejecutar esta acción",1,403);
        }
        if ($exception instanceof NotFoundHttpException) {
           
           return $this->errorResponse("No se encontró la URL especificada",1,404);
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            
            return $this->errorResponse('El método especificado en la petición no es válido',1,405);
        }
        if ($exception instanceof QueryException) {

            $code = $exception->errorInfo[1];

            if ($code === 1451) {
                return $this->errorResponse("No se puede eliminar de forma permanente el recurso porque está relacionada con algún otro.",1,409);
            }
            if ($code === 1146) {
                return $this->errorResponse("No existe la tabla en el esquema base de datos.",1,409);
            }
            if ($code === 1062) {
                return $this->errorResponse("Ya existe el valor en la tabla",1,409);
            }
            // if ($code === 23000) {
            //    return $this->errorResponse("Error de integridad de datos",1,409);
            // }

            if ($exception->getCode() == 2002) {
                 return $this->errorResponse("No se puede establecer una conexión ya que el equipo de destino denegó expresamente dicha conexión",1,503); 
            }
            
            
        }
        if ($exception instanceof HttpException) {
            
            return $this->errorResponse($exception->getMessage(),1,404);
        }

        // if ($exception instanceof InvalidArgumentException) {
            
        //     return $this->errorResponse($exception->getMessage(),1,400);
        // }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }
        return $this->errorResponse("Falla inesperada, intenete luego.",1,500);
       
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {

        $errors = $e->validator->errors()->getMessage();

        return $this->errorResponse($errors,1,422);

        //  if ($e->response) {
        //     return $e->response;
        // }
        // return $request->expectsJson()
        //             ? $this->invalidJson($request, $e)
        //             : $this->invalid($request, $e);
    }
}
