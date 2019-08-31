<?php
$menu['investigate']= array(
    'class' => "header",
    'title' => 'การสอบสวน',
    //'url'=>'main/form/receive',
     'cond' => trim(current_user('user_type'))=='lawyer' || current_user('user_type')=='staff',
    'bullet' => 'fa fa-gavel',
    'item' => array(
        'list' => array('bullet' => '',
            'title' => 'การการสอบสวนใหม่',
            'url' => 'main/investigate/list/view',
            'cond' => current_user('user_type')=='staff',
            ),
        'list_inv' => array('bullet' => '',
            'title' => 'การดำเนินการสอบสวน',
            'url' => 'main/investigate/list_progress/view',
            'cond' => trim(current_user('user_type'))=='lawyer',
            ),
    )
);