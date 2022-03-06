<?php

namespace Modules\Core\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Core\Models\BaseModel;
use Modules\Core\Repositories\BaseRepository;

class BaseEloquentRepository implements BaseRepository
{
    /**
     * @var BaseModel
     */
    protected $model;

    /**
     * @param BaseModel $model
     */
    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return BaseModel
     */
    public function find($id): BaseModel
    {
        return $this->model->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->latest()->paginate($perPage);
    }

    /**
     * @param array $attributes
     * @return BaseModel
     */
    public function create(array $attributes): BaseModel
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @param $id
     * @return BaseModel
     */
    public function update(array $attributes, $id): BaseModel
    {
        $model = $this->find($id);

        $model->fill($attributes);

        return tap($model)->save();
    }

    /**
     * @param $id
     * @return BaseModel
     */
    public function delete($id): BaseModel
    {
        $model = $this->find($id);

        $model->delete();

        return $model;
    }
}
