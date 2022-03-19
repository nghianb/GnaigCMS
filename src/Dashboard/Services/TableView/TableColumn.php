<?php

namespace Modules\Dashboard\Services\TableView;

use Closure;

class TableColumn
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var mixed|string
     */
    protected $label;

    /**
     * @var Closure
     */
    protected $transformer;

    /**
     * @param string $name
     * @param $option
     */
    public function __construct(string $name, $option)
    {
        $this->name = $name;

        if (is_string($option)) {
            $this->label = $option;
        }

        if (is_array($option)) {
            $this->label = $option['label'] ?? '';
            $this->transformer = $option['transformer'] ?? '';
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getValue($row)
    {
        if ($this->transformer instanceof Closure) {
            return call_user_func($this->transformer, $row);
        }

        return $row[$this->name];
    }
}
