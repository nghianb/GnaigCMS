<?php

namespace Modules\User\Models;

use Modules\Core\Models\BaseUserModel;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends BaseUserModel
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
        'password'
    ];

    /**
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return "$this->firstname $this->lastname";
    }

    /**
     * @return UserFactory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
