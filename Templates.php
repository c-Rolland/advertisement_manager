<?php

/*
 * This file is part of the "Advertisements Manager" project.
 *
 * (c) 2020 - crolland.fr
 */

declare(strict_types=1);

namespace AdvertisementsManagerApp;

/**
 * Class Templates.
 *
 * This class help to build the page views.
 *
 * @author Rolland Csatari <rolland.csatari@gmail.com>
 */
class Templates
{
    const APP_NAME = 'Advertisements Manager';

    /**
     * This is the default style
     *
     * @var string
     */
    const DEFAULT_STYLE = '<style type="text/css"> 
        body {padding-left: 15%; padding-right: 15%;}
        .user-list-item, 
        .advertisement-list-item { width: 100%; height: auto; padding: 10px; margin-bottom: 3px; display: block; background: #f7f7f7;}
        .page-title {width: 100%; height: auto; padding: 10px; margin-bottom: 10px; display: block; background: #f7f7f7; border-bottom: 2px solid #dedede}
        .created-by {font-size: 14px}
        .menu-section {width: 100%; height: auto; padding: 10px; margin-bottom: 3px; display: block; background: #f7f7f7; border-bottom: 2px solid #dedede}
        .menu-section-title { width: 100%; height: auto; font-size: 16px; display: block; margin-bottom: 5px;}
        .menu-item {width: 100%; height: auto; display: block; text-decoration: none;}
        .menu-section-title {font-size: 16px;}
    </style>';

    /**
     * @var string
     */
    protected $headContent = '';

    /**
     * @var string
     */
    protected $stylesheet = '';

    /**
     * @var string
     */
    protected $footer = '';

    /**
     * @var string
     */
    protected $loadedView = '';

    /**
     * This method return the loaded view.
     */
    public function getLoadedView(): string
    {
        return $this->loadedView;
    }

    /**
     * This method build the page head content.
     */
    public function setHeadContent(string $head): void
    {
        $this->headContent = sprintf('<!DOCTYPE html><html><head>%s %s</head>', $head, static::DEFAULT_STYLE);
    }

    public function setFooterContent(string $footerContent = ''): void
    {
        $this->footer = sprintf('<footer>%s</footer></html>', $footerContent);
    }

    /**
     * This method build the page body content.
     */
    public function render(string $pageTitle, string $body, bool $displayLinks = true): void
    {
        /* Build page heads content */
        $this->setHeadContent(sprintf('<title>%s</title>', $pageTitle));

        /* Build page body content.*/
        $view = sprintf('<span class="page-title">%s - %s</span>', static::APP_NAME, $pageTitle);
        $view.= $body;
        $view.= '<hr />';

        /* Build footer content. */
        $displayLinks ? $this->setFooterContent($this->links()) : $this->setFooterContent();
        $this->loadedView = sprintf('%s %s %s', $this->headContent, $view, $this->footer);
    }

    /**
     * This method build the navigation section.
     */
    private function links(): string
    {
        $content = '<span class="menu-section">';
        $content.= '<span class="menu-section-title">Menu</span>';
        $content.= '<a class="menu-item" href="./user-list">List of Users</a>';
        $content.= '<a class="menu-item" href="./advertisements-list">List of Advertisements</a>';
        $content.= '</span>';

        return $content;
    }
}
