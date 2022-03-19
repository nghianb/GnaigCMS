<?php

namespace Modules\Catalog\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Catalog\Database\Factories\CategoryFactory;

class Category extends BaseModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'parent_id',
        'name',
        'description'
    ];

    /**
     * @return CategoryFactory
     */
    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }
}
