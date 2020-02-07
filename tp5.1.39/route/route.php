<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::get('/','index');
Route::get('search/:id/:uid','address/search');
\think\facade\Route::get('details/:id','Address/details');


\think\facade\Route::group('col',[
    ':id'=>'Collect/read',
        ':name'=>'Collect/who'
    ]
)->pattern(['id'=>'\d+$','name'=>'\w+$'])->ext('html')->allowCrossDomain();


\think\facade\Route::miss('public/miss');
return [

];
