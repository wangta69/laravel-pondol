<div class="pondol-table-wrapper">
    <div class="table-responsive"> {{-- Bootstrap 5의 가로 스크롤 허용 클래스 --}}
        <table class="pondol-table">
            <thead>
                <tr class="text-center">
                    <th style="width: 60px;">ID</th>
                    <th class="text-start">제목/콘텐츠</th>
                    <th class="pondol-d-mobile-none">카테고리</th> {{-- 모바일에서 숨김 --}}
                    <th>상태</th>
                    <th class="text-end pe-4">등록일</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="pondol-td-num">105</td>
                    <td class="text-start">
                        <a href="#" class="pondol-td-main pondol-text-truncate">
                            시스템 점검 안내 및 업데이트 공지사항입니다.
                        </a>
                        {{-- 모바일에서만 제목 아래에 나타날 서브 정보 --}}
                        <div class="d-md-none x-small text-muted">공지사항 | 관리자</div>
                    </td>
                    <td class="pondol-d-mobile-none">공지사항</td>
                    <td class="pondol-td-badge">
                        <span class="badge bg-success">완료</span>
                    </td>
                    <td class="text-end pe-4 pondol-td-date">
                        2026-05-28
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
