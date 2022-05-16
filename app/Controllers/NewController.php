<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewModel;

class NewController extends BaseController
{
    public function index()
    {
        //
    }

    public function insert()
    {
        $new = new NewModel();
    }
}
