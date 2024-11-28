/** for bootstrp5 dynamic toaster */
var toast_to = '';
function showToaster(obj) {
  var title = obj.title;
  var message = obj.message;
  var alert = typeof obj.alert == 'undefined' ? true : obj.alert;
  toast_to = typeof obj.url != 'undefined' ? obj.url : '';
  if (toast_to) {
    $(".toast-footer").removeClass('d-none');
  } else {
    $(".toast-footer").addClass('d-none');
  }

  $("#toast-container").prepend($("#toast-placement").html());
  $toaster = $(".toast-placement").eq(0);
  $toaster.find('.me-auto').html(title);
  $toaster.find('.toast-body').html(message);

  if (alert) {
    $toaster.find('.toast-header').addClass('text-dark bg-warning');
  } else {
    $toaster.find('.toast-header').addClass('text-white bg-success');
  }
  
  $toaster.toast({delay: 5000});
  $toaster.toast('show'); // OK
  $toaster.on('hidden.bs.toast', function($ev){
    $ev.currentTarget.remove();
  })
}
// toaster 관련 끝

//  관리자 data select용 (date-select.js)
// jQuery( document ).ready(function( $ ) {
$(function(){
  // 날짜 검색
  $( "#from-date").datepicker({
    dateFormat: 'yy-mm-dd',
  });

  $(".from-calendar").on('click', function(){
    $( "#from-date" ).datepicker( "show" );
  })

  $( "#to-date").datepicker({
    dateFormat: 'yy-mm-dd',
  });

  $(".to-calendar").on('click', function(){
    $( "#to-date" ).datepicker( "show" );
  })

  $(".act-set-date").on('click', function(){
    var day = $(this).attr("user-attr-term");
    var settingDate = new Date();

    settingDate.setDate(settingDate.getDate()-day); //하루 전
    $( "#from-date" ).datepicker( "setDate", settingDate );
    $( "#to-date" ).datepicker( "setDate", new Date() );
  })
  // 기간설정 후 검색
  $(".btn-serch-date").on('click', function(){
    $("#search-form").trigger( "submit" );
  })
  // 키워드 검색
  $(".btn-serch-keyword").on('click', function(){
    $("#search-form").trigger( "submit" );
  })
})

// route 관련
// route.js
var csrf_token = $("meta[name=csrf-token]" ).attr("content");
var onprocessing = false;
// serializeObject for jQuery 
$.fn.serializeObject = function() {
  "use strict"
  var result = {}
  var extend = function(i, element) {
    var node = result[element.name]
    if ("undefined" !== typeof node && node !== null) {
      if (Array.isArray(node)) {
        node.push(element.value)
      } else {
        result[element.name] = [node, element.value]
      }
    } else {
      result[element.name] = element.value
    }
  }

  $.each(this.serializeArray(), extend)
  return result
}

var ROUTE = {
  routetostring: function(params, callback) {

    $.ajax({
      url: '/route-url',
      type: 'GET',
      data: $.param({route: params.route, segments: params.segments}),
      success: function(url) {
        callback({error: false, url});
      }
    });
  }, 
  ajaxroute: function(type, params, callback) {
    // {route: '', segments: [], data: {}}
    // var routedata = $.param( route);
    if (onprocessing === false) {
      onprocessing = true;
      params.segments = params.segments || [];
      params.data = params.data || {};
      
      $.ajax({
        url: '/route-url',
        type: 'GET',
        data: $.param({route: params.route, segments: params.segments}),
        success: function(url) {
          params.data._token = csrf_token;
          $.ajax({
            url: url,
            type: type,
            data: params.data,
            success: function(resp) {
              onprocessing = false;
              callback(resp);
            },
            error : function(xhr, ajaxSettings, thrownError) 
            {
              console.log('xhr:', xhr);
              console.log('ajaxSettings:', ajaxSettings);
              console.log('thrownError:', thrownError);
            },
            complete : function()
            {
              onprocessing = false;
            }
          });
        }
      });
    }
  }
};

// 팝업 윈도우 관련시작
function window_open (url, winname, params) {
  var defaultOpt = {width: 700, height: 500, scrollbars: 'auto'};

  params = params || [];
  var objs = [defaultOpt, params];
  var newOpts =  objs.reduce(function (r, o) {
    Object.keys(o).forEach(function (k) {
      r[k] = o[k];
    });
    return r;
  }, {});

  newOpts.left = (document.body.offsetWidth / 2) - (200 / 2);
  //&nbsp;만들 팝업창 좌우 크기의 1/2 만큼 보정값으로 빼주었음

  newOpts.top= (window.screen.height / 2) - (300 / 2);
  //&nbsp;만들 팝업창 상하 크기의 1/2 만큼 보정값으로 빼주었음

  var opt = 'scrollbars = ' + newOpts.scrollbars + ', width=' + newOpts.width + ', height=' + newOpts.height + ', left=' + newOpts.left + ', top=' + newOpts.top;
  window.open(url, winname, opt);
}

function win_user(url) {
  window_open(url, '', {width: 900, height: 600});
}

// 팝업윈도우 관련 끝
