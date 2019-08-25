<div class="container">
<div id="ajaxResponse">
</div>

<div class="card"><div class="card-body"><div class="row"><div class="col-12 col-md-12 col-lg-12">
<?php
print "<p id='investigate_table'>โปรดรอสักครู่..</p>";


    $data=array(
        'id'=>'delete_investigate',
        'title'=>'ลบเรื่องสอบสวน',
        'content'=>'<p id="progress_content">โปรดรอสักครู่..</p>'                
    );
    print gen_modal($data);

    $data=array(
        'id'=>'edit_investigate',
        'title'=>'แก้ไขเรื่องที่สอบสวน',
        'content'=>'<p id="progress_content">โปรดรอสักครู่..</p>'                
    );
    print gen_modal($data);
?>

</div>
</div>
</div>
</div>
</div>
<script>
$(function(){
    load_table_investigate();
});

    function load_table_investigate(){
        $('#investigate_table').load('<?php
            print site_url('ajax/investigate/list/table');
            ?>');
    }
</script>