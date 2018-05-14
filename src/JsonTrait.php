<?php

namespace Witify\LaravelJsonResponse;

use Witify\LaravelJsonResponse\ResponseFactory;

trait JsonTrait
{
    private $jsonResponseFactory;

    public function json()
    {
        if ($this->jsonResponseFactory === null) {
            $this->jsonResponseFactory = new ResponseFactory();
        }

        return $this->jsonResponseFactory;
    }
}
