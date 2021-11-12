<!DOCTYPE html>
<html>
<head>
    <title>Shopping List Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>Shopping List Manager</h1>
    </header>

    <main>

        <!-- part 1: the errors -->
        <?php if (count($errors) > 0) : ?>
        <h2>Errors:</h2>
        <ul>
            <?php foreach($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <!-- part 2: the items -->
        <h2>Items:</h2>
        <?php if (count($item_list) == 0) : ?>
            <p>There are no Items in the shopping list.</p>
        <?php else: ?>
            <ul>
            <?php foreach( $item_list as $id => $item ) : ?>
                <li><?php echo $id + 1 . '. ' . $item; ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <br>

        <!-- part 3: the add form -->
        <h2>Add Item:</h2>
        <form action="." method="post" >
            <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="itemlist[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="text" name="newitem" id="newitem"> <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Add Item">
        </form>
        <br>

        <!-- part 4: the modify/promote/delete form -->
        <?php if (count($item_list) > 0 && empty($item_to_modify)) : ?>
        <h2>Select Item:</h2>
        <form action="." method="post" >
            <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="itemlist[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <select name="itemid">
                <?php foreach( $item_list as $id => $item ) : ?>
                    <option value="<?php echo $id; ?>">
                        <?php echo $item; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Modify Item">
            <input type="submit" name="action" value="Promote Item">
            <input type="submit" name="action" value="Delete Item">

            <br><br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Sort Items">
        </form>
        <?php endif; ?>

        <!-- part 5: the modify save/cancel form -->
        <?php if (!empty($item_to_modify)) : ?>
        <h2>Items to Modify:</h2>
        <form action="." method="post" >
            <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="itemlist[]" value="<?php echo $item; ?>">
            <?php endforeach; ?>
            <label>Item:</label>
            <input type="hidden" name="modifieditemid" value="<?php echo $item_index; ?>">
            <input type="text" name="modifieditem" value="<?php echo $item_to_modify; ?>"><br>
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Save Changes">
            <input type="submit" name="action" value="Cancel Changes">
        </form>
        <?php endif; ?>

    </main>
</body>
</html>

