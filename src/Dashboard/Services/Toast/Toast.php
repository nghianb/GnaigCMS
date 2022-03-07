<?php

namespace Modules\Dashboard\Services\Toast;

class Toast
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $message
     * @param string $type
     */
    public function __construct(string $message, string $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
