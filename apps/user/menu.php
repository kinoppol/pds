<?php
$menu['user']= array(
    'class' => "header",
    'title' => 'ผู้ใช้',
    'cond' => true,
    'bullet' => 'fa fa-users',
    'item' => array(
        'manage' => array('bullet' => '',
            'title' => 'โปรไฟล์',
            'url' => 'main/user/profile/general',
            'cond' => true,
            ),
            
        'picture' => array('bullet' => '',
        'title' => 'รูป',
        'url' => 'main/user/picture/general',
        'cond' => true,
        ),
        ),
        
    );