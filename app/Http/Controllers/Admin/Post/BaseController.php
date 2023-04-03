<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Services\Admin\Post\Service;

class BaseController extends Controller
{
  protected $service;

  /**
   * Class constructor.
   */
  public function __construct(Service $service)
  {
    $this->service = $service;
  }
}