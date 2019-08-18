<?php
$menu['admin']= array(
    'class' => "header",
    'title' => 'ดูแลระบบ',
    'cond' => current_user('user_type')=='admin',
    'bullet' => 'fa fa-gears',
    'item' => array(
        'manage' => array('bullet' => '',
            'title' => 'จัดการระบบ',
            'url' => 'main/admin/manage/general',
            'cond' => true,
            ),
        ),
        
    );