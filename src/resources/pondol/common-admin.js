// src/resources/pondol/common-admin.js
$(function () {
  // 날짜 검색
  $("#from-date").datepicker({
    dateFormat: "yy-mm-dd",
  });

  $(".from-calendar").on("click", function () {
    $("#from-date").datepicker("show");
  });

  $("#to-date").datepicker({
    dateFormat: "yy-mm-dd",
  });

  $(".to-calendar").on("click", function () {
    $("#to-date").datepicker("show");
  });

  $(".act-set-date").on("click", function () {
    var day = $(this).attr("user-attr-term");
    var settingDate = new Date();

    settingDate.setDate(settingDate.getDate() - day); //하루 전
    $("#from-date").datepicker("setDate", settingDate);
    $("#to-date").datepicker("setDate", new Date());
  });
  // 기간설정 후 검색
  $(".btn-serch-date").on("click", function () {
    $("#search-form").trigger("submit");
  });
  // 키워드 검색
  $(".btn-serch-keyword").on("click", function () {
    $("#search-form").trigger("submit");
  });

  // 사이드바 토글 기능 추가
  $("#sidebarCollapse").on("click", function () {
    // 사이드바(#sidebar)와 메인 컨텐츠 영역에 active 클래스를 토글합니다.
    $("#sidebar").toggleClass("active");

    // 만약 전체 레이아웃이나 푸터 등도 같이 움직여야 한다면
    // .wrapper나 .container 등에도 active를 토글할 수 있습니다.
    $(".wrapper").toggleClass("active");
  });
});

function win_user(url) {
  window_open(url, "", { width: 900, height: 600 });
}

// 팝업윈도우 관련 끝
