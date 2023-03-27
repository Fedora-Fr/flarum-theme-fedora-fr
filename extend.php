<?php

namespace FedoraFr\Theme;

use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        // Add CSS & JS
        ->css(__DIR__ . '/less/forum.less')
        ->js(__DIR__ . '/js/dist/forum.js')
        // Add templates
        ->content(FedoraFrTheme::class),

    (new Extend\View())
        // Add view folder
        ->namespace('theme-fedorafr', __DIR__ . '/views'),

    // Replace code by Emoji
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->Emoticons->add(':)', '🙂');
            $config->Emoticons->add(':-)', '🙂');
            $config->Emoticons->add(':D', '😃');
            $config->Emoticons->add(':P', '😛');
            $config->Emoticons->add(':(', '🙁');
            $config->Emoticons->add(':-(', '🙁');
            $config->Emoticons->add(':|', '😐');
            $config->Emoticons->add(':-|', '😐');
            $config->Emoticons->add(';)', '😉');
            $config->Emoticons->add(';-)', '😉');
            $config->Emoticons->add(':\'(', '😢');
            $config->Emoticons->add(':O', '😮');
            $config->Emoticons->add('>:(', '😡');
        })
];
