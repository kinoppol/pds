<?php
$menu['form']= array(
    'class' => "header",
    'title' => 'ยื่นเรื่องร้องเรียน',
    'cond' => current_user('user_type')=='user',
    'bullet' => 'fa fa-book',
    'item' => array(
        'card' => array('bullet' => '',
            'title' => 'จากบัตรสนเทห์',
            'url' => 'main/form/card/f1',
            'cond' => true,
            ),
        'department' => array('bullet' => '',
            'title' => 'จากหน่วยงาน',
            'url' => 'main/form/department/f2',
            'cond' => true,
            ),
        'websites' => array('bullet' => '',
            'title' => 'จากเว็บไซต์',
            'url' => 'main/form/websites/f3',
            'cond' => true,
            ),
    )
        );