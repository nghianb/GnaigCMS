<?php

namespace Modules\Customer\Models;

use Modules\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customer\Database\Factories\CustomerFactory;

class Customer extends BaseModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'phone',
        'password'
    ];

    /**
     * @return CustomerFactory
     */
    protected static function newFactory(): CustomerFactory
    {
        return CustomerFactory::new();
    }
}
