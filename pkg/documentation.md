# Gallerista

A free JavaScript image gallery framework that simplifies
the process of creating beautiful image galleries for the web and mobile devices.

Its quick replacement for galleria.js

MIT license

---

### PHP:

```php
  use \Waxedphp\Galleria\Setter as Galleria;

  $gal = new Galleria($this->waxed);
  $gal->setRoute('/images/betty/{PATH}')
  ->addFolder('/Collection/betty')
  ;

  $this->waxed->pick('main')->display([
    'payload1' => $gal->value(),
  ], 'templates/galleria');


```
---

### HTML:

```html

  <div
    class="waxed-gallerista"
    data-name="payload1"
  >

  </div>


```

---
---

### PHP methods:

```php

  // clears already added images.
  $gal->clear();

  // set route, from which images will be served
  $gal->setRoute('/images/betty/{PATH}');

  // load all images from folder
  $gal->addFolder('/Collection/betty');

  // add image
  $gal->addImage('/Collection/betty/image.jpg');

  // add image together with additional values
  $gal->addImage([
    'image' => '/Collection/betty/image.jpg',
    'title' => 'Betty',
    'description' => 'Betty bla bla bla...',
    //...
  ]);

  // returns values for frontend.
  $gal->value();

```

### Options:

