<?php

namespace Modules\Catalog\Repositories\Eloquent;

use Modules\Catalog\Models\Category;
use Modules\Catalog\Repositories\CategoryRepository;
use Modules\Core\Models\BaseModel;
use Modules\Core\Repositories\Eloquent\BaseEloquentRepository;

class CategoryEloquentRepository extends BaseEloquentRepository implements CategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
