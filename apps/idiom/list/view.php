<div class="container">
<div id="ajaxResponse">
</div>

<div class="card"><div class="card-body"><div class="row"><div class="col-12 col-md-12 col-lg-12">
<?php
load_fun('form');

print "<p id='idiom_table'>โปรดรอสักครู่..</p>";
$data=array(
    'id'=>'progress_idiom',
    'title'=>'การดำเนินสำนวน',
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
    load_table_idiom();
});
    function load_table_idiom(){
        $('#idiom_table').load('<?php
            print site_url('ajax/idiom/list/table');
            ?>');
    }
</script>