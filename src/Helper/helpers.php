<?php

if (!function_exists('set_config')) {
  /**
   * @params string $file : config file name(ex: app)
   * @params array $data  : 
   */
  function set_config($file, $data) {
    foreach($data as $k => $v) {
      config()->set($file.'.'.$k, $v);
    }
    
    $text = '<?php return ' . var_export(config($file), true) . ';';
    file_put_contents(config_path($file.'.php'), $text);
  }
}

if (!function_exists('replaceInFile')) {
  function replaceInFile($search, $replace, $path)
  {
    file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
  }
}

if (!function_exists('astro')) {
 /**
   * 문자열 별표처리 @deprecated helper에서 처리
   */
  function astro($str, $len, $position='end') {
    $ast = '';
    for ($i = 0; $i < $len; $i++) {
      $ast .= '*';
    }
    return mb_substr($str, '0', -$len) . $ast;
  }
}

if (!function_exists('addHypenToMobile')) {
  /**
   * 전화번호에 하이펀 추가
   */
  function addHypenToMobile($tel) {
    if ($tel) {
      $tel = preg_replace("/[^0-9]*/s", "", $tel); // 숫자이외 제거

      if (substr($tel, 0, 2) == '02' ) {
        return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $tel);
      } else if(substr($tel, 0, 2) == '8' && substr($tel, 0, 2) == '15' || substr($tel, 0, 2) =='16' || substr($tel, 0, 2) == '18') {
        return preg_replace("/([0-9]{4})([0-9]{4})$/","\\1-\\2", $tel);
      } else {
        return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $tel);
        //핸드폰번호만 이용한다면 이것만 있어도 됨
      }
    } else {
      return $tel;
    }
  }
}