<?php

namespace Modules\Dashboard\Services\Sidebar;

use Illuminate\Support\Collection;

class SidebarItem
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $routeName;

    /**
     * @var Collection
     */
    protected $children;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->routeName = $attributes['route'] ?? null;
        $this->children = (new Collection($attributes['children'] ?? []))
            ->map(function ($child) {
                return $child instanceof SidebarItem ? $child :
                    new SidebarItem($child);
            });
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->children->isNotEmpty();
    }

    /**
     * @return bool
     */
    public function isActivated(): bool
    {
        return request()->routeIs($this->routeName) ||
            $this->children->some(function (SidebarItem $child) {
                return $child->isActivated();
            });
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->routeName ? route($this->routeName) : '';
    }
}
