<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\Admin\User\Service;

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