<?php

declare(strict_types=1);

/*
 * This file is part of the "Advertisements Manager" project.
 *
 * (c) 2020 - crolland.fr
 */

namespace AdvertisementsManagerApp;

/**
 * Class MainController.
 *
 * @author Rolland Csatari <rolland.csatari@gmail.com>
 */
class MainController
{
    /**
     * @var DatabaseManager
     */
    protected $databaseManager;

    /**
     * @var Templates
     */
    protected $template;

    /**
     * @var string
     */
    protected $requestUri;

    public function __construct(DatabaseManager $databaseManager, Templates $template)
    {
        $this->databaseManager = $databaseManager;
        $this->template = $template;
        $this->requestUri = $_SERVER['REQUEST_URI'];
    }

    /**
     * This generate the index page view.
     */
    public function indexPage(): void
    {
        $this->template->render('Index page', '');
    }

    /**
     * This method generate the user page view.
     */
    public function userListPage(): void
    {
        $users = $this->databaseManager->fetchUserList();
        $content = '';

        foreach ($users as $user) {
            $content.= sprintf('<span class="user-list-item">#%s %s</span>',$user['id'], $user['name']);
        }

        $this->template->render('User list', $content);
    }

    /**
     * This method generate the advertisement page view.
     */
    public function advertisementListPage(): void
    {
        $advertisements = $this->databaseManager->fetchAdvertisementList();
        $content = '';

        foreach ($advertisements as $advertisement) {
            $content.= sprintf('<span class="advertisement-list-item"><strong>%s</strong> <i class="created-by">created by %s</i></span>',$advertisement['advertisement_title'], $advertisement['user_name']);
        }

        $this->template->render('Advertisement list', $content);
    }

    /**
     * This method load the requested route view.
     */
    public function boot(): void
    {
        switch ($this->requestUri) {
            case '/':
                $this->indexPage();
                break;
            case '/user-list':
                $this->userListPage();
                break;
            case '/advertisements-list':
                $this->advertisementListPage();
                break;
            default:
                $this->indexPage();
                break;
        }

        echo $this->template->getLoadedView();
    }
}
