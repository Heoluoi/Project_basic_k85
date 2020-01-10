<?php
function showErrors($errors,$name){
    if ($errors->has($name)){
    echo '<div class="alert alert-danger" role="alert">';
    echo '<strong>'.$errors->first($name).'</strong>';
    echo '</div>';
    }
}

//danh mục đệ quy
function showCate($arr,$parent,$tab){
	foreach($arr as $row){
		if($row['parent']==$parent){
			echo '<option>'.$tab.$row['name'].'</option>';

		showCate($arr,$row['id'],$tab.'--|');
		}
	}
}
