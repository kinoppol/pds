<?php
$menu['source']= array(
    'class' => "header",
    'title' => 'แหล่งรับเรื่องร้องเรียน',
    'cond' => trim(current_user('user_type'))=='staff',
    'bullet' => 'fa fa-users',
    'item' => array(
        'list' => array('bullet' => '',
            'title' => 'รายการ',
            'url' => 'main/source/list/view',
            'cond' => true,
            ),
        ),
        
    );