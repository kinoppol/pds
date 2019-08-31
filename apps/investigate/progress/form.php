<?php
//$complaint_data=sSelectTb($systemDb,'complaint','*','id='.$hGET['id']);
//$complaint_data=$complaint_data[0];
?>
<div id="stepResponse">
</div>
<div class="card"><div class="card-body">
<?php
$investigate_id=$hGET['id'];
    $step=array(
        
    );
    $data=array(
        'id'=>'modal_resive',
        'label'=>'<i class="fa fa-check"></i> รับเรื่อง สอบสวน',
        'color'=>'btn-success btn-lg btn-block',
        'onlyClickClose'=>true,
        //'onClick'=>'gen_index()',
    );
    print gen_modal_botton($data);
?>

</div>
</div>

<div id="show_step">
</div>

<?php
$systemFoot.='
<script>
    $(function(){
        load_step();
    });

    function load_step(){
        $("#show_step").load("'.site_url('ajax/investigate/progress/show_step/id/'.$investigate_id).'");
    }
</script>
';