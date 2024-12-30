<?php
namespace Pondol\Common\Services;

use Pondol\Common\Models\JsonKeyValue;

class JsonKeyValueService
{
  /**
   * 단순 문자 가져오기
   */
  public static function get($key)
  {
    $obj = JsonKeyValue::where('key', $key)->first();
    return $obj ? $obj->v : null;
  }
  /**
   * 단순 문자 저장
   */
  public static function set($key, $value)
  {
    return JsonKeyValue::updateOrCreate(['key' => $key],['v' => $value]);
  }

  /**
   * Json 타입으로 데이타 가져오기
   */
  public static function getAsJson($key)
  {
    $obj = JsonKeyValue::where('key', $key)->first();
    return $obj ? json_decode($obj->v) : json_decode('{}');
  }

   /**
   * 배열을 json 형태로 저장
   */
  public static function storeAsJson($key, $arr)
  {
    return JsonKeyValue::updateOrCreate(['key' => $key],['v' => json_encode($arr)]);
  }

  /**
   * Array Type으로 배열 가져오기
   */
  public static function getAsArray($key)
  {
    $obj = JsonKeyValue::where('key', $key)->first();
    return $obj ? json_decode($obj->v, true) : [];
  }

 

  // public static function storeJson($key, $jsonObj)
  // {
  //   return JsonKeyValue::updateOrCreate(['key' => $key],['v' => $jsonObj]);
  // }

  /**
   * 기존 필드를 업데이트 한다.
   * @params String | Array $value
   */
  public static function update($key, $value, $item=null) {
    $typeof = gettype($value);
    $current = self::getAsArray($key);
    $v = $value;
    
    if($item) { // 세부 키 변경
      $current[$item] = $v;
    } else { // 전체 변경
      $current = array_replace_recursive($current, $value);
    }

    self::storeAsJson($key, $current);
  }
}
