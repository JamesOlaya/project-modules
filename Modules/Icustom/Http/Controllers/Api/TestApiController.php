<?php

namespace Modules\Icustom\Http\Controllers\Api;
use Modules\Core\Icrud\Controllers\BaseCrudController;
use Modules\Igamification\Database\Seeders\IgamificationSeeder;

class TestApiController extends BaseCrudController
{
  public function __construct()
  {

  }

  public function test()
  {
    $service = new IgamificationSeeder();
    $service->run();
    dd(">>> Hello");
  }
}
