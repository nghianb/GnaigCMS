<?php

namespace Modules\Dashboard\Services\PageView;

class PageView
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $headerTitle;

    /**
     * @var string
     */
    protected $headerPreTitle;

    public function __construct()
    {
        $this->title = '';
        $this->headerTitle = '';
        $this->headerPreTitle = '';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return PageView
     */
    public function setTitle(string $title): PageView
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getHeaderTitle(): string
    {
        return $this->headerTitle;
    }

    /**
     * @param string $headerTitle
     * @return PageView
     */
    public function setHeaderTitle(string $headerTitle): PageView
    {
        $this->headerTitle = $headerTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getHeaderPreTitle(): string
    {
        return $this->headerPreTitle;
    }

    /**
     * @param string $headerPreTitle
     * @return PageView
     */
    public function setHeaderPreTitle(string $headerPreTitle): PageView
    {
        $this->headerPreTitle = $headerPreTitle;

        return $this;
    }
}
