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
    private const ASSETS_PATH = '/assets/extensions/fedora-fr-theme';
    private const COMMON_URI = 'https://common.fedora-fr.org/v6';

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

        // Add manifest
        Arr::set(
            $document->head,
            'manifest',
            '<link rel="manifest" href="' . self::ASSETS_PATH . '/manifest.webmanifest">'
        );

        // Override favicon with svg.
        Arr::set(
            $document->head,
            'favicon',
            '<link rel="icon" href="' . self::COMMON_URI . '/fedora-fr_icon.svg" sizes="any" type="image/svg+xml">'
        );



        $forumApiDocument['data']['attributes']['headerHtml'] = $this->createHeader();
        $forumApiDocument['data']['attributes']['footerHtml'] = $this->createFooter();

        $document->setForumApiDocument($forumApiDocument);
    }


    /**
     * Footer controler.
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
