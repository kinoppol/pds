<?php
$menu['idiom']= array(
    'class' => "header",
    'title' => 'ดำเนินการ',
    //'url'=>'main/form/receive',
    'cond' => trim(current_user('user_type'))=='lawyer',
    'bullet' => 'fa fa-book',
    'item' => array(
        'list' => array('bullet' => '',
            'title' => 'เรื่องร้องเรียน',
            'url' => 'main/idiom/list/view',
            'cond' => true,
            ),
    )
        );