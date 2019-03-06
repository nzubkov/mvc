<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 12:59
 */
return [
    'routes' => [
        '/',
        'admin',
        'users',
        'user/profile',
        'user/create',
        'user/update',
        'users/sort/',
        'user/remove',
        'user/setavatar',
        'file/upload',
        'file/delete',
    ],
    'controllers' => [
        'user',
        'file',
        'admin',
        'profile',
        'registration',
        'index',
        '404' => 'NotFoundController',
    ],
];