<?php

namespace Modules\Catalog\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Modules\Catalog\Repositories\CategoryRepository;
use Modules\Catalog\TableViews\CategoryTableView;
use Modules\Dashboard\Http\Controllers\BaseController;
use Modules\Dashboard\Services\Toast\Toaster;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var Toaster
     */
    protected $toaster;

    /**
     * @param CategoryRepository $categoryRepository
     * @param Toaster $toaster
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        Toaster $toaster
    ) {
        parent::__construct();

        $this->categoryRepository = $categoryRepository;
        $this->toaster = $toaster;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $this->page->setTitle('Category List')
            ->setHeaderTitle('Category List')
            ->setHeaderPreTitle('Categories');

        $categories = $this->categoryRepository->paginate();

        return $this->respondTableView(new CategoryTableView($categories));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('catalog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('catalog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('catalog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $category = $this->categoryRepository->find($id);

        $this->categoryRepository->delete($category->id);

        $this->toaster->success(__('Category ":category_name" deleted', [
            'category_name' => $category->name
        ]));

        return $this->redirectToRoute('categories.index');
    }
}
