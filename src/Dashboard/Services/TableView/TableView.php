<?php

namespace Modules\Dashboard\Services\TableView;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;

abstract class TableView
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Collection
     */
    protected $rows;

    /**
     * @var Collection
     */
    protected $columns;

    /**
     * @var array
     */
    public $actions;

    /**
     * @param Arrayable $rows
     */
    public function __construct(Arrayable $rows)
    {
        $this->rows = $rows;
        $this->columns = $this->mapColumns($this->columns());
        $this->actions = $this->actions();
    }

    /**
     * @param array $columns
     * @return Collection
     */
    protected function mapColumns(array $columns): Collection
    {
        return collect($columns)->map(function ($col, $name) {
            return new TableColumn($name, $col);
        });
    }

    /**
     * @return array
     */
    public abstract function columns(): array;

    /**
     * @return array
     */
    public function actions(): array
    {
        return [];
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasAction($name = null): bool
    {
        if (!$name) {
            return !empty($this->actions);
        }

        return isset($this->actions[$name]);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * @return Arrayable
     */
    public function getRows(): Arrayable
    {
        return $this->rows;
    }

    /**
     * @return bool
     */
    public function hasPagination(): bool
    {
        return $this->rows instanceof LengthAwarePaginator;
    }

    /**
     * @return Htmlable|null
     */
    public function renderPagination(): ?Htmlable
    {
        if (!$this->hasPagination()) {
            return null;
        }

        return $this->rows->links('dashboard::components.pagination');
    }
}
