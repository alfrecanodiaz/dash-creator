<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @return \Illuminate\Validation\Factory
     */
    public function getValidator()
    {
        return app("validator");
    }

    /**
     * @return \Illuminate\Hashing\BcryptHasher
     */
    public function hasher()
    {
        return app("hash");
    }
}
