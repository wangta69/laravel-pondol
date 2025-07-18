<?php
return [
  'component' => ['admin'=>['layout'=>'pondol-common::common-admin', 'lnb'=>'pondol-common::partials.navigation']],
  'route_admin' => [
    'prefix' => 'common/admin',
    'as' => 'common.admin.',
    'middleware' => ['web', 'admin']
  ],
];
