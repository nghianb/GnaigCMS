<?php

namespace Modules\User\Repositories\Eloquent;

use Modules\User\Models\User;
use Modules\User\Repositories\UserRepository;
use Modules\Core\Repositories\Eloquent\BaseEloquentRepository;

class UserEloquentRepository extends BaseEloquentRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
