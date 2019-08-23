<?php
load_fun('form');

$query='select userdata.id,concat(fname," ",lname) as flname from userdata left join personal on personal_id=personal.id';
$user_data=mysqli_query($db,$query);

while($row=mysqli_fetch_assoc($user_data)){
    $user_list[$row['id']]=$row['flname'];
}

$complaint_data=sSelectTb($systemDb,'complaint','subject','id='.$hGET['id']);
$complaint_data=$complaint_data[0];

$inputDetail = array(
    'complaint_id' => array(
        'type' => 'hidden',
        'value' => $hGET['id']
    ),
    'subject' => array(
        'label' => 'ชื่อเรื่อง',
        'type' => 'text',
        'icon' => 'fa fa-edit',
        'attr'=>array(
            'disabled'
        ),
        'value' => $complaint_data['subject'],
    ),
    'user_id' => array(
        'label' => 'ผู้รับสำนวน',
        'type' => 'select',
        'item' => $user_list,
        'icon' => 'fa fa-user-secret'
    ),
    'submit' => array(
        'label' => '&nbsp;',
        'type' => 'submit',
        'value' => 'มอบหมาย'
    )
);
$onSubmit .= '
$("#transfer_complaint").modal("hide");
';
$inputForm = genInput($inputDetail, 4, 12);
$saveURL=site_url('ajax/complaint/transfer/save');
$form_content=genForm(array(
'id' => 'transferForm',
'action' => $saveURL,
'ajaxSubmit' => $inputDetail,
'response' => 'ajaxResponse',
'onSubmit' => $onSubmit,
'item' => $inputForm
));

print $form_content;