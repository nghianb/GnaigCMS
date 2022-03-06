<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Core\Models\BaseModel;

interface BaseRepository
{
    /**
     * Find a model by id
     *
     * @param $id
     * @return BaseModel
     */
    public function find($id): BaseModel;

    /**
     * Get all model
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    /**
     * Create a new model
     *
     * @param array $attributes
     * @return BaseModel
     */
    public function create(array $attributes): BaseModel;

    /**
     * Update a model by id
     *
     * @param array $attributes
     * @param $id
     * @return BaseModel
     */
    public function update(array $attributes, $id): BaseModel;

    /**
     * Delete a model by id
     *
     * @param $id
     * @return BaseModel
     */
    public function delete($id): BaseModel;
}
