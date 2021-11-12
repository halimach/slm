<?php
//Index.php ... Description... 
//get itemlist array from POST
$item_list = filter_input(INPUT_POST, 'itemlist',
        FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($item_list === NULL) {
    $item_list = array();
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch( $action ) {
    case 'Add Item':
        $new_item = filter_input(INPUT_POST, 'newitem');
        if (empty($new_item)) {
            $errors[] = 'The new list cannot be empty.';
        } else {
            
            array_push($item_list, $new_item);
        }
        break;
    case 'Delete Item':
        $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
        if ($item_index === NULL || $item_index === FALSE) {
            $errors[] = 'The item cannot be deleted.';
        } else {
            unset($item_list[$item_index]);
            $item_list = array_values($item_list);
        }
        break;

    case 'Modify Item':
      $item_index = filter_input(INPUT_POST,'itemid', FILTER_VALIDATE_INT);

      if ($item_index === NULL || $item_index === FALSE) {
        $errors[] = 'The item cannot be modified.';
      } else {
        $item_to_modify = $item_list[$item_index];
      }

      break;


    case 'Save Changes':


    break;

    case 'Cancel Changes':
    break;

    case 'Promote Item':

    $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);

  if ($item_index === NULL || $item_index === FALSE) {

    $errors[] = 'The item cannot be promoted.';

  } elseif ($item_index == 0) {

    $errors[] = 'You can\'t promote the first item.';

  }
  else {

  // get the values for the two indexes

    $item_value = $item_list[$item_index];
    $prior_item_value = $item_list[$item_index-1];
    // swap the values
    $item_list[$item_index-1] = $item_value;
    $item_list[$item_index] = $prior_item_value;
  }
    break;

    case 'Sort Items':
  break;
}

include('item_list.php');
?>

