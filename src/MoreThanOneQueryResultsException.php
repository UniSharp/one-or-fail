<?php

namespace UniSharp\OneOrFail;

use RuntimeException;

class MoreThanOneQueryResultsException extends RuntimeException
{
    protected $model;

    public function setModel($model)
    {
        $this->model = $model;

        $this->message = "More than one query results for model [{$model}]";

        return $this;
    }
}
