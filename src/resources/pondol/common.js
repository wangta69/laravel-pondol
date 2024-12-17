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

$(function(){
  $(document).on('click', '.act-toast-to', 'click', function(){
    if(toast_to) {
      location.href = toast_to;
    }
  });
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

/**
 * 콤마삭제
 */
function removeComma(str){
	var rtnstr="";
	if (str){
		for (var i=0; i<str.length; i++){
			if (str.charAt(i)!=","){
				rtnstr += str.charAt(i);
			}
		}
	}
	return parseInt(rtnstr);
}


/**
 * 부호포함 (일반적으로는 아래 setComma 사용 추천)
 * @param {*} str 
 * @returns 
 */
function add_comma(str)
{
  var number = '';

  if (typeof str === 'undefined') {
    return;
  }
  
  // 숫자면 문자열로 변경
  str = typeof(str) == 'number' ? str.toString() : str;
  // comma 를 제거한다.
  number = str.replace(/[\,]/g, "")

  // sign +, - 가 존재하면 이 부분은 별도로 빼둔다.
  var sign = number.match(/^[\+\-]/);
  if(sign) {
    number = number.replace(/^[\+\-]/, "");
  }

  // 숫자가 아닌 경우 삭제
  number = number.replace(/[^0-9]/g, "");
  number = setComma(number);

  if(sign != null)
    number = sign + number;

  return number;
}


function setComma(value) {//","컴마를 붙이기
	str = typeof(value) == 'number' ? value.toString() : value;
	var rtn = "";
	var val = "";
	var j = 0;
	x = str.length;
	
	for(i = x; i > 0; i--) {
		if(str.substring(i, i - 1) != ",") {
			val = str.substring(i, i - 1)+val;
		}
	}
	x = val.length;
	for(i = x; i > 0; i--) {
		if(j % 3 == 0 && j != 0) {
			rtn = val.substring(i, i - 1) + "," + rtn; 
		}else {
			rtn = val.substring(i, i - 1) + rtn;
		}
	j++;
	}
	return rtn;
}



// 전화번호에 숫자를 입력
function add_phone_hyphen(str)
{
  var phone = '';

  if (!str) {
    return;
  }
  
  // 숫자면 문자열로 변경
  str = typeof(str) == 'number' ? str.toString() : str;
  // 하이펀  제거한다.
  phone = str.replace(/[\-]/g, "")

  // 숫자가 아닌 경우 삭제
  phone = phone.replace(/[^0-9]/g, "");

  var len = phone.length;
  if(len > 3 && len < 7) {
    phone = phone.replace(/(\d{3})(\d+)/, '$1-$2');
  } else if(len <= 10) {
    phone = phone.replace(/(\d{3})(\d{3})(\d+)/, '$1-$2-$3');
  } else {
    phone = phone.replace(/(\d{3})(\d{4})(\d+)/, '$1-$2-$3');
  }
  return phone ? phone : '';
}

/**
 * 유니크한 값만 넣기
 */
function array_push_unique(arr, item) {
  if(arr.indexOf(item) === -1) {
    arr.push(item);
    return true;
  } else {
    return false;
  }
}

function removeElement(arr, elementToRemove) {
  arr.forEach((item, index) => {
    if (item === elementToRemove) {
      arr.splice(index, 1);
    }
  });
  return arr;
}



function trim(s)
{
  var t = "";
  var from_pos = to_pos = 0;

  for (i=0; i<s.length; i++)
  {
    if (s.charAt(i) == ' ')
      continue;
    else
    {
      from_pos = i;
      break;
    }
  }

  for (i=s.length; i>=0; i--)
  {
    if (s.charAt(i-1) == ' ')
      continue;
    else
    {
      to_pos = i;
      break;
    }
  }

  t = s.substring(from_pos, to_pos);
  //				alert(from_pos + ',' + to_pos + ',' + t+'.');
  return t;
}

// 쿠키 입력
function set_cookie(name, value, expirehours, domain)
{
  var today = new Date();
  today.setTime(today.getTime() + (60*60*1000*expirehours));
  document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + today.toGMTString() + ";";
  if (domain) {
    document.cookie += "domain=" + domain + ";";
  }
}

// 쿠키 얻음
function get_cookie(name)
{
  var find_sw = false;
  var start, end;
  var i = 0;

  for (i=0; i<= document.cookie.length; i++)
  {
    start = i;
    end = start + name.length;

    if(document.cookie.substring(start, end) == name)
    {
      find_sw = true
      break
    }
  }

  if (find_sw == true)
  {
    start = end + 1;
    end = document.cookie.indexOf(";", start);

    if(end < start)
      end = document.cookie.length;

    return unescape(document.cookie.substring(start, end));
  }
  return "";
}

// 쿠키 지움
function delete_cookie(name)
{
  var today = new Date();

  today.setTime(today.getTime() - 1);
  var value = get_cookie(name);
  if(value != "")
    document.cookie = name + "=" + value + "; path=/; expires=" + today.toGMTString();
}