<?php

namespace Modules\Dashboard\Composers;

use Illuminate\View\View;
use Modules\Dashboard\Services\Sidebar\Sidebar;
use Modules\Dashboard\Services\Toast\Toaster;

class ToastComposer
{
    /**
     * @var Sidebar
     */
    protected $toaster;

    /**
     * @param Toaster $toaster
     */
    public function __construct(Toaster $toaster)
    {
        $this->toaster = $toaster;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('toaster', $this->toaster);
    }
}
