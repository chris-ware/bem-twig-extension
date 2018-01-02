# bem-twig-extension
Twig function that inserts static classes in BEM methodology.

Based on [https://github.com/drupal-pattern-lab/bem-twig-extension], but adapted to be available as a normal twig extension

## Add Extension

```php
$twig = new Twig_Environment($loader, $options);
$twig->addExtension(new Bem\Twig\BemExtension());
```

## Usage (4 arguments)

#### Simple block name (required argument):
`<h1 {{ bem('title') }}>`

This creates:

`<h1 class="title">`

#### Block with modifiers (optional array allowing multiple modifiers):
`<h1 {{ bem('title', ['small', 'red']) }}>`

This creates:

`<h1 class="title title--small title--red">`

#### Element with modifiers and blockname (optional):
`<h1 {{ bem('title', ['small', 'red'], 'card') }}>`

This creates:

`<h1 class="card__title card__title--small card__title--red">`

#### Element with blockname, but no modifiers (optional):

`<h1 {{ bem('title', '', 'card') }}>`

This creates:

`<h1 class="card__title">`

#### Element with modifiers, blockname and extra classes (optional - in case you need non-BEM classes):

`<h1 {{ bem('title', ['small', 'red'], 'card', ['js-click', 'something-else']) }}>`

This creates:

`<h1 class="card__title card__title--small card__title--red js-click something-else">`

#### Element with extra classes only (optional):

`<h1 {{ bem('title', '', '', ['js-click']) }}>`

This creates:

`<h1 class="title js-click">`
