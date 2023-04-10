<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "admin/check-current-pwd",
        "admin/update-section-status",
        "admin/update-brand-status",
        "admin/update-blog-status",
        "admin/update-banner-status",
        "admin/update-tag-status",
        "admin/update-category-status",
        "admin/append-categories-level",
        "admin/update-product-status",
        '*',
    ];
}