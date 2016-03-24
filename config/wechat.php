<?php
return [
    'use_alias'    => env('WECHAT_USE_ALIAS', false),
    'app_id'       => env('WECHAT_APPID', 'wxe662b0bb3c01df13'), // 必填
    'secret'       => env('WECHAT_SECRET', 'de52685fa0c96c9ae166bdd3ac5dd1ec'), // 必填
    'token'        => env('WECHAT_TOKEN', 'lx1036'),  // 必填
    'encoding_key' => env('WECHAT_ENCODING_KEY', 'YourEncodingAESKey'), // 加密模式需要，其它模式不需要
    'keyword'      => env('WECHAT_KEYWORD', '文化当当'),
    'times'        => env('WECHAT_TIMES', 1),
    'vote_keyword' => env('VOTE_KEYWORD', '节目投票'),
    'item_name'    => [
        '开场舞（舞蹈）',
        '日百：甄嬛歪传（小品）',
        '客服：百家讲坛（模仿秀）',
        '出版物：为你读诗（诗朗诵）',
        '人事行政：斗牛舞（舞蹈）',
        '海外购&数码3C：戏说西游（舞台剧）',
        '新事业部：贝加尔湖畔（歌曲）',
        '财务：陌上花开（舞蹈）',
        '客服：客服的一天（舞台剧）',
        '运营中心&服装：夜来香（歌伴舞）',
        '技术：你最幸福（相声）',
        '数字业务：小幸运（小合唱）',
//        '高管节目',
        '仓店部：舞动奇迹（舞蹈）',
    ],
    'voice_users'   => 'oTVSSw3u4YKlWjs3wNMuwxGAmGb8',
//    'version'      => \App\ShakeToken::where()
];