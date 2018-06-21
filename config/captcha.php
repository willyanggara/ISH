<?php
/*
 * Secret key and Site key get on https://www.google.com/recaptcha
 * */
return [
    'secret' => env('6LeMgl0UAAAAAFav01eIm3Bv6W13Y2ygQRmfqF9e', '6LeMgl0UAAAAAFav01eIm3Bv6W13Y2ygQRmfqF9e'),
    'sitekey' => env('6LeMgl0UAAAAAL_pu8wf8r6nzJ_5WKdaiQrLRgj1', '6LeMgl0UAAAAAL_pu8wf8r6nzJ_5WKdaiQrLRgj1'),
    /**
     * @var string|null Default ``null``.
     * Custom with function name (example customRequestCaptcha) or class@method (example \App\CustomRequestCaptcha@custom).
     * Function must be return instance, read more in folder ``examples``
     */
    'request_method' => null,
    'options' => [
        'multiple' => false,
        'lang' => app()->getLocale(),
    ],
    'attributes' => [
        'theme' => 'light'
    ],
];
