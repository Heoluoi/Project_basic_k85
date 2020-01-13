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
			echo '<option value="'.$row['id'].'">'.$tab.$row['name'].'</option>';

		showCate($arr,$row['id'],$tab.'--|');
		}
	}
}

function getCate($arr,$parent,$tab){
	foreach($arr as $row){
		if($row['parent']==$parent){
			echo '<div class="item-menu"><span>'.$tab.$row['name'].'</span>
                    <div class="category-fix">
                    <a class="btn-category btn-primary" href="editcategory.html"><i class="fa fa-edit"></i></a>
                    <a class="btn-category btn-danger" href="#"><i class="fas fa-times"></i></i></a>

                    </div>
                </div>';

		getCate($arr,$row['id'],$tab.'--|');
		}
	}
}
