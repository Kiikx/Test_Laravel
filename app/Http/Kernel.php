<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Autres propriétés et méthodes...

    protected $routeMiddleware = [
        // Autres middlewares...
        'AdminMiddleware' => \App\Http\Middleware\AdminMiddleware::class,
        // Autres middlewares...
    ];

    // Autres propriétés et méthodes...
}