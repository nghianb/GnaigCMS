<?php

namespace Modules\Dashboard\Composers;

use Illuminate\View\View;
use Modules\Dashboard\Services\Sidebar\Sidebar;

class SidebarComposer
{
    /**
     * @var Sidebar
     */
    protected $sidebar;

    /**
     * @param Sidebar $sidebar
     */
    public function __construct(Sidebar $sidebar)
    {
        $this->sidebar = $sidebar;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('sidebar', $this->sidebar->items());
    }
}
