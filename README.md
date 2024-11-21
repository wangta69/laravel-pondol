# Common resources for Laravel Pondol's packages
> 현재 제공중인 라라벨용 패키지들의 공동 리소스 등이 포함 된 패키지 입니다. 

## Install
```
composer require wangta69/laravel-pondol
php artisan  pondol:install-common
```

## Components
### app
> 기본적인 app 설정
```
<x-pondol-common::app>
```

### app-simple-sidebar
> left Gnb 가 포함된 레이아웃
```
<x-pondol-common::app-simple-sidebar navigation="visitors::navigation">
```
### app-bare
> Top Gnb 가 포함된 레이아웃
```
<x-pondol-common::app-bare header="pondol-auth::partials.front-header">
```

### app-blank
> 아무것도 존재 하지 않음(팝업등에 사용)
```
<x-pondol-common::app-blank>
```