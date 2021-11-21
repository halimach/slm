
<?php
//session_start();
$item_list = filter_input(INPUT_POST, 'itemlist', FILTER_DEFAULT,
    FILTER_REQUIRE_ARRAY);
if ($item_list === NULL) {
    $item_list = array();
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process

switch( $action ) {
    case 'add':
        $new_item = filter_input(INPUT_POST, 'item');
        if (empty($new_item)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $item_list[] = $new_item;
        }
        break;
    case 'delete':
        $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
        if ($item_index === NULL || $item_index === FALSE) {
            if( !isset($_POST['sort'])) {
                $errors[] = 'The task cannot be deleted.';
            }
        } else {
            unset($item_list[$item_index]);
            $item_list = array_values($item_list);

        }
    case 'modify':


        break;
}
?>





<?php

    require 'include/database.php';
    if(isset($_POST['submit'])){

        //Add database connection
        require 'include/database.php';
        $sItem = $_POST['item'];

        if(!empty($_POST['item'])){
            $sItem = $_POST['item'];
            $query= "insert into shoplist(itemName) values('$sItem')";
            $run = mysqli_query($conn,$query) or die(mysqli_error());
        }else{
           echo '<script type= "text/javascript"> alert("No recorde") "location:"index.php?error=sqlerror" </script>';
            header("location:index.php?error=sqlerror");


        }

}
include('index-inc.php');
