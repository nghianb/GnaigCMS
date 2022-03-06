<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Modules\Core\Http\Controllers\BaseController as BaseCoreController;
use Modules\Dashboard\Services\PageView\PageView;

class BaseController extends BaseCoreController
{
    /**
     * @var PageView
     */
    protected $page;

    public function __construct()
    {
        $this->page = new PageView();
    }

    /**
     * @param string $viewName
     * @param array $data
     * @return Renderable
     */
    public function respondView(string $viewName, array $data = []): Renderable
    {
        return view($viewName, array_merge($data, [
            'page' => $this->page
        ]));
    }

    /**
     * @param $routeName
     * @param array $parameters
     * @return RedirectResponse
     */
    public function redirectToRoute($routeName, array $parameters = []): RedirectResponse
    {
        return redirect()->route($routeName, $parameters = []);
    }
}
