<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class DashboardController extends BaseController
{
    /**
     * @return Renderable
     */
    public function show(): Renderable
    {
        $this->page->setTitle('Dashboard')
            ->setHeaderTitle('OverView')
            ->setHeaderPreTitle('Dashboard');

        return $this->respondView('dashboard::index');
    }
}
