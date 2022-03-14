<?php

namespace Modules\Customer\Repositories\Eloquent;

use Modules\Customer\Models\Customer;
use Modules\Core\Repositories\Eloquent\BaseEloquentRepository;
use Modules\Customer\Repositories\CustomerRepository;

class CustomerEloquentRepository extends BaseEloquentRepository implements CustomerRepository
{
    /**
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
