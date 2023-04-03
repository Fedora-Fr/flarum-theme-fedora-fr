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

    // Replace plugins in theme code for modifications
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            // Replace Emoji plugin
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
            // Replace BBCode plugin
            $config->BBCodes->addFromRepository('B');
            $config->BBCodes->addFromRepository('I');
            $config->BBCodes->addFromRepository('U');
            $config->BBCodes->addFromRepository('S');
            $config->BBCodes->addFromRepository('URL');
            $config->BBCodes->addFromRepository('IMG');
            $config->BBCodes->addFromRepository('EMAIL');
            $config->BBCodes->addFromRepository('CODE');
            $config->BBCodes->addFromRepository('QUOTE');
            $config->BBCodes->addFromRepository('LIST');
            $config->BBCodes->addFromRepository('DEL');
            $config->BBCodes->addFromRepository('COLOR');
            $config->BBCodes->addFromRepository('CENTER');
            $config->BBCodes->addFromRepository('SIZE');
            $config->BBCodes->addFromRepository('*');
        })
];
