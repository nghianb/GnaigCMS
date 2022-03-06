<?php

namespace Modules\Dashboard\Services\Sidebar;

use Illuminate\Support\Collection;

class Sidebar
{
    /**
     * @var Collection
     */
    protected $items;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->items = (new Collection($config['items']))
            ->sortBy('order')
            ->map(function ($item) {
                return new SidebarItem($item);
            });
    }

    /**
     * @return Collection
     */
    public function items(): Collection
    {
        return $this->items;
    }

    /**
     * @param array $item
     * @return void
     */
    public function add(array $item)
    {
        $this->items->prepend(new SidebarItem($item));
    }
}
