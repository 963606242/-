<?php
/*
 * @Author: your name
 * @Date: 2021-10-08 10:56:23
 * @LastEditTime: 2021-10-19 14:39:14
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \tp30\app\provider.php
 */
use app\ExceptionHandle;
use app\Request;

// 容器Provider定义文件
return [
    'think\Request'          => Request::class,
    'think\exception\Handle' => ExceptionHandle::class,
    'think\Paginator'        =>'app\common\Bootstrap5'
];
