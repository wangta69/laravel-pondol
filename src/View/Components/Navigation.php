<?php

namespace Pondol\Common\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Pondol\Common\Models\ManageMenu;

class Navigation extends Component
{
    public function __construct() {}

    public function render()
    {
        $items = ManageMenu::orderBy('order')->get();
        $adminHome = $this->resolveAdminHome();

        return view('pondol-common::components.partials.common-navigation', compact('items', 'adminHome'));
    }

    /**
     * 독립 관리자 vs 통합 관리자 홈 URL 자동 감지 로직
     */
    private function resolveAdminHome(): string
    {
        // 1. config에 명시된 설정이 있는 경우
        $configuredHome = config('pondol-common.admin_home');
        if (! empty($configuredHome)) {
            return Route::has($configuredHome) ? route($configuredHome) : url($configuredHome);
        }

        $segments = request()->segments(); // URL 세그먼트 배열
        $path = request()->path();

        // 2. 통합 관리자 모드: URL이 'admin/'으로 시작하는 경우 (예: admin/bbs, admin/auth)
        if (str_starts_with($path, 'admin')) {
            return url('admin');
        }

        // 3. 독립 관리자 모드: URL에 'admin'이 포함된 경우 (예: bbs/admin/*, auth/admin/*, common/admin/*)
        $adminIndex = array_search('admin', $segments);
        if ($adminIndex !== false) {
            // 'admin' 세그먼트까지의 경로를 조합 (예: /bbs/admin)
            $adminSegments = array_slice($segments, 0, $adminIndex + 1);

            return url(implode('/', $adminSegments));
        }

        // 4. 기본 Fallback: config의 route_admin prefix
        return url(config('pondol-common.route_admin.prefix', 'common/admin'));
    }
}
