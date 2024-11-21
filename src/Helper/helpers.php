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