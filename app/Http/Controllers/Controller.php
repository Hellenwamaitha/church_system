<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  

    /**
     * Get the authenticated user's name.
     *
     * @return string|null
     */
    protected function getUserName()
    {
        return auth()->user()->name ?? null;
    }

    // Add any other shared functionality here
}
