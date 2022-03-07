<?php

namespace Modules\Dashboard\Services\Toast;

use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class Toaster
{
    /**
     * @var Store
     */
    protected $session;

    /**
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param string $message
     * @return self
     */
    public function success(string $message): self
    {
        return $this->toast($message, 'success');
    }

    /**
     * @param string $message
     * @return self
     */
    public function error(string $message): self
    {
        return $this->toast($message, 'danger');
    }

    /**
     * @param string $message
     * @param string $type
     * @return self
     */
    public function toast(string $message, string $type): self
    {
        $toasts = $this->getToasts();

        $toasts->push(new Toast($message, $type));

        $this->setToasts($toasts);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getToasts(): Collection
    {
        return $this->session->get('toast', new Collection());
    }

    /**
     * @param Collection $toasts
     */
    protected function setToasts(Collection $toasts): void
    {
        $this->session->flash('toast', $toasts);
    }
}
