<?php
$menu['timeline']= array(
    'class' => "header",
    'title' => 'ติดตามการดำเนินการ',
    'cond' => current_user('user_type')=='advisor',
    'bullet' => 'fa fa-list-ol',
    'item' => array(
        'complaint' => array('bullet' => 'fa fa-user-secret',
            'title' => 'การสืบสวน',
            'url' => 'main/timeline/complaint/list',
            'cond' => true,
            ),
            
        'investigate' => array('bullet' => 'fa fa-sitemap',
        'title' => 'การสอบสวน',
        'url' => 'main/timeline/investigate/list',
        'cond' => true,
        ),
        ),
        
    );