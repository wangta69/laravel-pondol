<?php
namespace Pondol\Common\Facades;
use Illuminate\Support\Facades\Facade;
class JsonKeyValue extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'jsonkeyvalue-facade';
  }
}
