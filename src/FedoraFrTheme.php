<?php

namespace FedoraFr\Theme;

use Flarum\Foundation\Config;
use Flarum\Frontend\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Arr;

/**
 * Main class for FedoraFrTheme
 */
class FedoraFrTheme
{
    /**
     * Constructor.
     *
     * @param ViewFactory $factory
     */
    public function __construct(private ViewFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Invocation.
     *
     * @param  Document $document
     */
    public function __invoke(Document $document): void
    {
        $forumApiDocument = $document->getForumApiDocument();
        $forumApiDocument['data']['attributes']['headerHtml'] = $this->createHeader();
        $forumApiDocument['data']['attributes']['footerHtml'] = $this->createFooter();

        $document->setForumApiDocument($forumApiDocument);
    }


    /**
     * Header controler.
     *
     * @return View
     */
    private function createHeader(): View
    {
        return $this->factory->make('theme-fedorafr::header');
    }

    /**
     * Footer controler.
     *
     * @return View
     */
    private function createFooter(): View
    {
        return $this->factory->make('theme-fedorafr::footer');
    }
}
