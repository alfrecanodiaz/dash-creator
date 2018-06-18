<?php
/**
 * Created by PhpStorm.
 * User: alfre
 * Date: 30/03/18
 * Time: 12:07 PM
 */

namespace App\Entities;

class RequestError
{
    /**
     * @var array $errors
     */
    public $errors = [];

    /**
     * @var int $statusCode
     */
    public $statusCode = 200;

    /**
     * @var bool $useApiMessage
     */
    public $useApiMessage = true;

    /**
     * RequestError constructor.
     * @param array $errors
     * @param int $statusCode
     * @param bool $useApiMessage
     */
    public function __construct($errors, $statusCode, $useApiMessage)
    {
        $this->createFromArray($errors);
        $this->setStatusCode($statusCode);
        $this->setUseApiMessage($useApiMessage);
    }

    /**
     * @param array $errors
     */
    public function createFromArray($errors)
    {
        if (is_array($errors) && !empty($errors))
        {
            foreach ($errors as $key => $error)
            {
                if (is_string($key) || is_int($key))
                    $this->errors[][$key] = $this->getErrorFromArray($error);
            }
        }
    }

    /**
     * @param int $statusCode
     */
    private function setStatusCode($statusCode)
    {
        if (!is_null($statusCode) && $statusCode > 0)
            $this->statusCode = $statusCode;
    }

    /**
     * @param bool $useApiMessage
     */
    private function setUseApiMessage($useApiMessage)
    {
        if (!is_null($useApiMessage) && is_bool($useApiMessage))
            $this->useApiMessage = $useApiMessage;
    }

    /**
     * @param array $error
     * @return string
     */
    private function getErrorFromArray($error)
    {
        if (!empty($error) && is_array($error) && array_key_exists(0, $error))
            return trim($error[0]);

        return "Ha ocurrido un error.";
    }
}