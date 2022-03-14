<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Modules\Customer\Repositories\CustomerRepository;
use Modules\Dashboard\Http\Controllers\BaseController;
use Modules\Dashboard\Services\Toast\Toaster;

class CustomerController extends BaseController
{
    /**
     * @var Toaster
     */
    protected $toaster;

    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * @param Toaster $toaster
     * @param CustomerRepository $customerRepository
     */
    public function __construct(
        Toaster $toaster,
        CustomerRepository $customerRepository
    ) {
        parent::__construct();

        $this->toaster = $toaster;
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $this->page->setHeaderTitle(__('Customer List'))
            ->setHeaderPreTitle(__('Customers'));

        $customers = $this->customerRepository->paginate();

        return $this->respondView('customer::customers.index', compact('customers'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $customer = $this->customerRepository->find($id);

        $this->customerRepository->delete($customer->id);

        $this->toaster->success(__('Customer ":username" deleted', [
            'username' => $customer->username
        ]));

        return $this->redirectToRoute('customers.index');
    }
}
