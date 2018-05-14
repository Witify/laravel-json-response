<?php

namespace Witify\LaravelJsonResponse;

use Illuminate\Http\JsonResponse;

class ResponseFactory
{
    /**
     * Http status code 
     *
     * @var string
     */
    private $statusCode = 200;

    /**
     * Get the http status code
     *
     * @return void
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    /**
     * Set the http status code
     *
     * @param int $statusCode
     * @return ResponseFactory
     */
    public function setStatusCode(int $statusCode) : ResponseFactory
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Creates a json response
     *
     * @param mixed $data
     * @param array $headers
     * @return Response
     */
    public function response($data, $headers = [])
    {
        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Success response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function success($message = "", $data = null)
    {
        return $this->response([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * Error response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function error($message = "", $data = null)
    {
        return $this->response([
            'success' => false,
            'errors' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ],
            'data' => $data,
        ]);
    }

    /**
     * Redirect response
     *
     * @param string $url
     * @param mixed $object
     * @return Response
     */
    public function redirect(string $url, $data = null)
    {
        return $this->response([
            'success' => true,
            'redirect' => $url,
            'data' => $data,
        ]);
    }

    /**
     * Created response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function created($message = 'Successfully created', $data = null)
    {
        return $this->setStatusCode(201)->success($message, $data);
    }

    /**
     * Bad request response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function badRequest($message = 'Bad Request', $data = null)
    {
        return $this->setStatusCode(400)->error($message, $data);
    }

    /**
     * Forbidden response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function forbidden($message = 'Forbidden', $data = null)
    {
        return $this->setStatusCode(403)->error($message, $data);
    }

    /**
     * Not found response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function notFound($message = 'Not Found', $data = null)
    {
        return $this->setStatusCode(404)->error($message, $data);
    }

    /**
     * Bad entity response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function badEntity($message = 'Bad Entity', $data = null)
    {
        return $this->setStatusCode(422)->error($message, $data);
    }

    /**
     * Server error response
     *
     * @param string $message
     * @param mixed $data
     * @return Response
     */
    public function serverError($message = 'Internal Server Error', $data = null)
    {
        return $this->setStatusCode(500)->error($message, $data);
    }
}
