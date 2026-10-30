<x-dynamic-component :component="config('pondol-common.component.admin.layout', 'pondol-common::common-admin')" :path="['시스템', 'UI/CSS 가이드']">

    <div class="container-fluid pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">UI / CSS 컴포넌트 가이드</h2>
                <p class="text-muted mb-0">각 패키지 관리자 화면을 개발할 때 일관된 디자인을 유지할 수 있는 가이드입니다.</p>
            </div>
        </div>

        <!-- 1. 버튼 가이드 -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 fw-bold"><i class="fas fa-hand-pointer me-2 text-primary"></i>버튼
                (Buttons)</div>
            <div class="card-body">
                <div class="mb-3">
                    <button type="button" class="btn btn-primary me-2"><i class="fas fa-save me-1"></i> 저장하기</button>
                    <button type="button" class="btn btn-secondary me-2">취소</button>
                    <button type="button" class="btn btn-success me-2"><i class="fas fa-download me-1"></i> 엑셀
                        다운로드</button>
                    <button type="button" class="btn btn-danger me-2"><i class="fas fa-trash me-1"></i> 삭제</button>
                    <button type="button" class="btn btn-outline-primary me-2">아웃라인</button>
                </div>
                <div>
                    <small class="text-muted d-block mb-1">버튼 크기:</small>
                    <button type="button" class="btn btn-primary btn-sm me-2">Small (.btn-sm)</button>
                    <button type="button" class="btn btn-primary me-2">Normal</button>
                    <button type="button" class="btn btn-primary btn-lg">Large (.btn-lg)</button>
                </div>
            </div>
        </div>

        <!-- 2. 대시보드 통계 카드 가이드 -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">총 게시글</span>
                            <h3 class="fw-bold my-1">1,248</h3>
                            <span class="text-success small fw-semibold"><i class="fas fa-arrow-up"></i> +12%</span>
                        </div>
                        <div class="bg-primary-subtle text-primary p-3 rounded-3 fs-3"><i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">신규 회원</span>
                            <h3 class="fw-bold my-1">324</h3>
                            <span class="text-danger small fw-semibold"><i class="fas fa-arrow-down"></i> -3%</span>
                        </div>
                        <div class="bg-success-subtle text-success p-3 rounded-3 fs-3"><i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. 표준 테이블 가이드 -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 fw-bold"><i class="fas fa-table me-2 text-primary"></i>표준 관리자 테이블
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>제목</th>
                                <th>작성자</th>
                                <th>상태 배지</th>
                                <th>등록일시</th>
                                <th class="text-end pe-4">관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4">1</td>
                                <td class="fw-semibold">공지사항 시스템 점검 안내</td>
                                <td>관리자</td>
                                <td><span class="badge bg-success-subtle text-success border border-success">게시중</span>
                                </td>
                                <td class="text-muted small">2026-03-30 14:00</td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">2</td>
                                <td class="fw-semibold">비공개 처리된 회원 문의건</td>
                                <td>홍길동</td>
                                <td><span class="badge bg-secondary-subtle text-secondary border">대기중</span></td>
                                <td class="text-muted small">2026-03-29 11:20</td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-outline-secondary me-1"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-dynamic-component>
