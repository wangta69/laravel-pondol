<?php

return [
    // 관리자 메인 경로 (null이면 URL 패턴을 분석하여 독립/통합 모드 자동 감지)
    // 특정 라우트나 URL로 고정하고 싶을 때만 'admin' 또는 'admin.dashboard' 형태로 지정
    'admin_home' => null,

    'component' => [
        'admin' => [
            'layout' => 'pondol-common::common-admin',
            'lnb' => 'pondol-common::partials.navigation',
        ],
    ],
    'route_admin' => [
        'prefix' => 'common/admin',
        'as' => 'common.admin.',
        'middleware' => ['web', 'admin'],
    ],
];
