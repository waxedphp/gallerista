<?php
namespace Waxedphp\Gallerista;

class Setter extends \Waxedphp\Waxedphp\Php\Setters\AbstractSetter {

    protected ?bool $autoplay = null;
    //Sets Galleria to play slidehow when initialized.

    protected ?bool $carousel = null;
    //Toggle the creation of a carousel.

    protected ?int $carouselSpeed = null;
    //Carousel animation speed in milliseconds.

    protected ?int $carouselSteps = null;
    //Defines how many “steps” the carousel should take on each nav click.

    //protected ?bool $clicknext
    //Helper for adding a click event on the entire stage to move forward.

    protected ?array $dailymotion = null;
    //Adds player options for the Daliymotion video player

    //dataConfig( [HTML element] )
    //Defines how Galleria should parse the HTML. Useful for adding custom HTML captions.

    protected ?string $dataSelector = null;
    //Defines the selector Galleria should look for in the source.

    //protected ?bool $dataSort
    //Function to sort the data before using it.

    protected ?array $dataSource = null;
    //Defines the Galleria data, or the HTML source where the data is found.

    protected ?bool $debug = null;
    //Set this to false to prevent debug messages.

    protected ?string $dummy = null;
    //Defines a dummy image that will be used if the image can’t be found.

    protected ?string $easing = null;
    //Defines the easing mode globally.

    //extend( [ options ] )
    //Add custom functionality to the gallery.

    protected ?bool $fullscreenCrop = null;
    //Sets how Galleria should crop when in fullscreen mode.

    protected ?bool $fullscreenDoubleTap = null;
    //Enabled fullscreen toggle on double-tap for touch devices.

    protected ?string $fullscreenTransition = null;
    //Defines a different transition for fullscreen mode.

    protected ?int $height = null;
    //Manually set a gallery height.

    protected ?bool $idleMode = null;
    //Option for turning on/off idle mode.

    protected ?int $idleTime = null;
    //Defines how long delay before Galleria goes into idle mode.

    protected ?int $idleSpeed = null;
    //Defines the animation speed in milliseconds when entering/exiting idle mode.

    protected null|bool|string $imageCrop = null;
    //Defines how Galleria will crop the image.
    /*
    true means that all images will be scaled to fill the stage, centered and cropped.
    false will scale down so the entire image fits.
    ‘height’ will scale the image to fill the height of the stage.
    ‘width’ will scale the image to fill the width of the stage.
    ‘landscape’ will fill up images that has landscape proportions, but scale portrait images to fit inside the container.
    ‘portrait’ is like ‘landscape’ but the other way around.
    */

    protected ?int $imageMargin = null;
    //Sets a margin between the image and the stage.

    protected ?bool $imagePan = null;
    //Toggles the image pan effect.

    protected ?bool $imagePanSmoothness = null;
    //Defines how smooth ( and CPU consuming ) the pan effect should be.

    protected ?bool $imagePosition = null;
    //Positions the image.

    protected ?int $imageTimeout = null;
    //Sets a timeout for fetching images.

    protected ?string $initialTransition = null;
    //Sets a different transition on the the first image.

    protected ?bool $keepSource = null;
    //Lets you keep the source elements.

    protected ?bool $layerFollow = null;
    //Boolean for controlling if the layer will follow the image size or not.

    //protected ?bool $lightbox = null;
    //Helper for attaching a lightbox (to zoom in) when the user clicks on an image.

    protected ?int $lightboxFadeSpeed = null;
    //Defines how fast the lightbox should fade.

    protected ?int $lightboxTransitionSpeed = null;
    //Defines how fast the lightbox should animate.

    protected ?int $maxScaleRatio = null;
    //Defines how much Galleria is allowed to upscale images.

    protected ?int $maxVideoSize = null;
    //Defines how much Galleria is allowed to upscale videos.

    protected ?string $overlayBackground = null;
    //Defines the background color of the overlay.

    protected ?int $overlayOpacity = null;
    //Sets how transparent the overlay should be.

    protected ?bool $pauseOnInteraction = null;
    //Toggles if Galleria should stop playing if the user navigates.

    protected ?bool $popupLinks = null;
    //Open Image links in new windows.

    protected ?int $preload = null;
    //Defines how much Galleria should preload.

    protected ?bool $queue = null;
    //Defines if Galleria should queue the slideshow.

    protected ?bool $responsive = null;
    //Sets Galleria in responsive mode.

    protected ?int $show = null;
    //Lets you start the slideshow at any image index.

    protected ?bool $showCounter = null;
    //Toggles the counter.

    protected ?bool $showInfo = null;
    //Toggles the caption.

    protected ?bool $showImagenav = null;
    //Toggles the image navigation arrows.

    protected ?bool $swipe = null;
    //Enables the swipe gesture for navigating on touch devices.

    protected null|bool|string $thumbCrop = null;
    //Same as image_crop for thumbnails.

    protected ?bool $thumbDisplayOrder = null;
    //Defines if the gallery should display the loaded thumbnails in order

    protected ?int $thumbMargin = null;
    // Same as imageMargin for thumbnails.

    protected null|bool|string $thumbnails = null;
    // Sets how and if thumbnails should be created.

    protected ?bool $thumbPosition = null;
    // Same as imagePosition for thumbnails.

    protected null|bool|string $thumbQuality = null;
    // Defines if and how IE should use bicubic image rendering for thumbnails

    protected ?bool $touchTransition = null;
    //Defines a different transition when a touch device is detected.

    protected ?string $transition = null;
    //Defines what transition to use.

    protected ?int $transitionSpeed = null;
    //Defines the speed of the transition.

    protected ?bool $trueFullscreen = null;
    //Makes Galleria enter a native fullscreen mode where supported.

    protected ?string $variation = null;
    //Visual variations of a theme

    protected ?string $videoPoster = null;
    //Defines if a poster image should be used for videos

    protected ?array $vimeo = null;
    //Sets options for the Vimeo player

    protected ?int $wait = null;
    //Defines if and how Galleria should wait until it can be displayed using user interaction.

    protected ?int $width = null;
    //Manually set a gallery width.

    protected ?array $youtube = null;
    //Sets options for the YouTube player

    protected ?string $theme = null;

  /**
   * @var array<mixed> $setup
   */
  private array $setup = [
  ];

  private array $images = [
  ];

  private string $route = '/images/{PATH}';

  /**
   * allowed options
   *
   * @var array<mixed> $_allowedOptions
   */
  protected array $_allowedOptions = [
    'autoplay', 'carousel', 'carouselSpeed', 'carouselSteps', 'clicknext', 'dailymotion',
    'dataConfig', 'dataSelector', 'dataSort', 'dataSource',
    'debug', 'dummy', 'easing', 'extend', 'fullscreenCrop', 'fullscreenDoubleTap',
    'fullscreenTransition', 'height', 'idleMode', 'idleTime', 'idleSpeed',
    'imageCrop', 'imageMargin', 'imagePan', 'imagePanSmoothness', 'imagePosition',
    'imageTimeout', 'initialTransition', 'keepSource', 'layerFollow', 'lightbox',
    'lightboxFadeSpeed', 'lightboxTransitionSpeed', 'maxScaleRatio', 'maxVideoSize',
    'overlayBackground', 'overlayOpacity', 'pauseOnInteraction', 'popupLinks', 'preload',
    'queue', 'responsive', 'show', 'showCounter', 'showInfo', 'showImagenav', 'swipe',
    'thumbCrop', 'thumbDisplayOrder', 'thumbMargin',  'thumbnails', 'thumbPosition', 'thumbQuality',
    'touchTransition', 'transition', 'transitionSpeed', 'trueFullscreen',
    'variation', 'videoPoster', 'vimeo', 'wait', 'width', 'youtube',
    'theme'
  ];

  function setRoute(string $value) {
    $this->route = $value;
    return $this;
  }

  function clear() {
    $this->images = [];
    return $this;
  }

  function addImage(string|array $value, array $data = []) {
    $allowedParams = [
      'thumb',// the thumbnail image (optional)
      'image',// the main image (required)
      'big',// the big image for fullscreen mode (optional)
      'title',// the image title (optional)
      'description',// the image description (optional)
      'link',// the image link url (optional)
      'layer',// A layer of HTML that will be displayed on top of the content (optional)
      'video',// An URL to a video, as per 1.2.7 we support Vimeo and Youtube URLs.
      'iframe',// An URL to be displayed in an iframe.
      //'original',// a reference to the original IMG element (optional)
      //Optional ‘srcset’ and ‘sizes’ (see the faq for additional information):
      'thumbsrcset',// the thumbnail image srcset
      'thumbsizes',// the thumbnail image sizes
      'imagesrcset',// the main image srcset
      'imagesizes',// the main image sizes
      'bigsrcset',// the big image srcset
      'bigsizes',// the big image sizes
    ];
    $d = [];
    if (is_string($value)) {
      $value = str_replace('{PATH}', $this->route, $value);
      $d['image'] = $value;
    } else if (is_array($value)) {
      $data = array_merge($data, $value);
    };
    if (!empty($data)) {
      foreach ($data as $k => $v) {
        if (in_array($k, $allowedParams)) {
          $d[$k] = $v;
        }
      };
    };
    $this->images[] = $d;
    return $this;
  }

  function addFolder(string $dir, string $pattern = '*.{png,jpg,jpeg}') {
    $prevDir = getcwd();//"./*/*.{png,jpg,jpeg}"
    if (is_dir($dir)) {
      chdir($dir);
      //echo "DIR! " . $dir;
      $a = glob($pattern, \GLOB_BRACE);
      asort($a);
      foreach ($a as $filename) {
          //echo "$filename\n";
          $this->addImage('{PATH}' . $filename);
      }
      chdir($prevDir);
    } else {
      //echo "NOT DIR!";
    }
    return $this;
  }

  function shuffle() {
    shuffle($this->images);
    return $this;
  }

  function random(int $num) {
    $num = min(count($this->images), $num);
    $nums = array_rand($this->images, $num);
    $d = [];
    foreach ($nums as $n) {
      $d[] = $this->images[$n];
    }
    $this->images = $d;
    return $this;
  }

  function setMode($mode) {
    $this->setup['mode'] = $mode;
    return $this;
  }

  function setImageCrop(string|bool $val) {
    $allowed = [
     'height',// will scale the image to fill the height of the stage.
     'width',// will scale the image to fill the width of the stage.
     'landscape',// will fill up images that has landscape proportions, but scale portrait images to fit inside the container.
     'portrait',// is like ‘landscape’ but the other way around.
    ];
    if ((is_bool($val)) || ((is_string($val))&&(in_array($val,$allowed)))) {
      $this->imageCrop = $val;
    }
    return $this;
  }

  function setThumbCrop(string|bool $val) {
    $allowed = [
     'height',// will scale the image to fill the height of the stage.
     'width',// will scale the image to fill the width of the stage.
     'landscape',// will fill up images that has landscape proportions, but scale portrait images to fit inside the container.
     'portrait',// is like ‘landscape’ but the other way around.
    ];
    if ((is_bool($val)) || ((is_string($val))&&(in_array($val,$allowed)))) {
      $this->thumbCrop = $val;
    }
    return $this;
  }

  function setThumbQuality(string|bool $val) {
    $allowed = [
     'auto',// uses high quality if image scaling is moderate.
    ];
    if ((is_bool($val)) || ((is_string($val))&&(in_array($val,$allowed)))) {
      $this->thumbCrop = $val;
    }
    return $this;
  }

  /**
  * value
  *
  * @param mixed $value
  * @return array<mixed>
  */
  public function value(mixed $value = null): array {
    $a = [];
    $b = $this->getArrayOfAllowedOptions();
    if (!empty($b)) {
      $a['config'] = $b;
    }
    if (!empty($this->images)) {
      $a['images'] = $this->images;
    };
    if (!is_null($value)) {
      $a['value'] = $value;
    }
    return $a;
  }

}
