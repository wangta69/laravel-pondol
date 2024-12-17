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
    return JsonKeyValue::updateOrCreate(['key' => $key],['v' => $value]);
  }

  public static function getAsJson($key)
  {
    $obj = JsonKeyValue::where('key', $key)->first();
    return $obj ? json_decode($obj->v) : (object)[];
  }

  public static function getAsArray($key)
  {
    $obj = JsonKeyValue::where('key', $key)->first();
    return $obj ? json_decode($obj->v) : [];
  }

  public static function storeAsJson($key, $arr)
  {

    return JsonKeyValue::updateOrCreate(['key' => $key],['v' => json_encode($arr)]);
  }
}
