<?php
$menu['investigate']= array(
    'class' => "header",
    'title' => 'เรื่องสอบสวน',
    //'url'=>'main/form/receive',
    'cond' => current_user('user_type')=='staff',
    'bullet' => 'fa fa-book',
    'item' => array(
        'list' => array('bullet' => '',
            'title' => 'เรื่องที่รับไว้',
            'url' => 'main/investigate/list/view',
            'cond' => true,
            ),
        'resive' => array('bullet' => '',
            'title' => 'รับเรื่องร้องเรียน',
            'url' => 'main/investigate/form/receive',
            'cond' => true,
            ),
    )
        );