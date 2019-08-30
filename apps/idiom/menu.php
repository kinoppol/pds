<?php
$menu['idiom']= array(
    'class' => "header",
    'title' => 'การสืบสวน',
    //'url'=>'main/form/receive',
    'cond' => trim(current_user('user_type'))=='lawyer',
    'bullet' => 'fa fa-book',
    'item' => array(
        'list' => array(
            'bullet' => '',
            'title' => 'รายการสำนวน',
            'url' => 'main/idiom/list/view',
            'cond' => true,
            ),
    )
        );