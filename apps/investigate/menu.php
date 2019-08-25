<?php
$menu['investigate']= array(
    'class' => "header",
    'title' => 'การสอบสวน',
    //'url'=>'main/form/receive',
    'cond' => current_user('user_type')=='staff',
    'bullet' => 'fa fa-gavel',
    'item' => array(
        'list' => array('bullet' => '',
            'title' => 'ชื่อรายการสอบสวน',
            'url' => 'main/investigate/list/view',
            'cond' => true,
            ),
    )
        );