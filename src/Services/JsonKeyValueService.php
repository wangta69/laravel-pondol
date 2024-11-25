<?php
namespace Pondol\Common\Services;

use Pondol\Common\Models\JsonKeyValue;

class JsonKeyValueService
{
  public static function get($key)
  {
    $obj = JsonKeyValue::where('key', $key)->first();
    return $obj ? $obj->v : null;
  }

  public static function set($key, $value)
  {
    $result =  JsonKeyValue::updateOrCreate(['key' => $key],['v' => $value]);
  }
}
