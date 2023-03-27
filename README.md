# flarum-theme-fedora-fr

[![DevOps](https://github.com/Fedora-Fr/flarum-theme-fedora-fr/actions/workflows/devops.yml/badge.svg)](https://github.com/Fedora-Fr/flarum-theme-fedora-fr/actions/workflows/devops.yml)

Flarum theme of Fedora-Fr.

## Build

~~~
cd js
npm install
npm run-script build
~~~

## Development

* Install:

~~~
composer install
cd js && npm install
~~~

* Test:

~~~
composer clear-cache:phpstan && composer analyse:phpstan
~~~
