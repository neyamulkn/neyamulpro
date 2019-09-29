<?php 

     $get_categories = DB::table('theme_category')->select('category_name')->get();
        $i = 0;
        foreach ($get_categories as  $value) {
            $data[] =  $value->category_name;
        } 

        echo json_encode($data);

?>