<?php
    function chk_step($complaint_id,$step_id){
        global $systemDb;
        $chk_step=sSelectTb($systemDb,'complaint_timeline','count(*) as c','complaint_id='.sQ($complaint_id).' AND step_id ='.sQ($step_id));
        $chk_step=$chk_step[0];
        if($chk_step['c']==1){
            return true;
        }else{
            return false;
        }

    }
?>