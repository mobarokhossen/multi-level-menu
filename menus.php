<?php


   function category($conn,$parent_id=0, $sub_menu=''){
       $dropdown = $dropdown_toggle = '';
       if($sub_menu == true)
       {
           $dropdown = 'dropdown';
           $dropdown_toggle = 'dropdown-toggle';
       }
        $categories = "select * from catagory where menu_st=1 and mparent =".$parent_id;
          $catp=mysqli_query($conn,$categories);
          while ($cat = mysqli_fetch_assoc($catp))
          {
              set_html($conn,$cat, $dropdown, $dropdown_toggle);
          }
   }
   
   
   function check_child_category($conn,$parent_id){
        $categories = "select COUNT(*) AS total from catagory where menu_st=1 and mparent =".$parent_id;
        $catp=mysqli_query($conn,$categories);
        $count = mysqli_fetch_array($catp);
        return $count['total'];
   }
   
   
   
   function set_html($conn,$cat, $dropdown, $dropdown_toggle)
   {
       if( check_child_category($conn,$cat['catagory_id'])>0){
           $dropdown = 'dropdown';
           $dropdown_toggle = 'dropdown-toggle';
       }
       else{
           $dropdown_toggle = '';
       }
       ?>
       <li class="nav-item <?=$dropdown?>" >
          <a class="nav-link <?=$dropdown_toggle?>" href="index.php" id="navbarDropdown" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$cat['catagory_title']?> <span class="sr-only"></span></a>
   <?php
       if( check_child_category($conn,$cat['catagory_id'])>0)
       {
           ?>
           <ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
               <?php
               category($conn,$cat['catagory_id'], true);
               ?>
           </ul>
           <?php
       }
       ?>
    </li>
   <?php
   }
   ?>
   
   
   <?php
   category($conn);
?>
