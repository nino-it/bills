<?php include('config.php'); ?>
<?php include('admin/newproduct.php'); ?>
<?php include('_START.php'); ?>

<?php session_start();

$newItem = new Item;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newItem->enterItem($_POST);
}

?>

<?php include('menu.php'); ?>
<main>

    <?php include('header.php'); ?>

    <div class="content col-md-7 col-lg-4">
        <div class="card">

            <div class="card-header"><strong>Enter new items</strong></div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="item-name" class="col-md-5">Product Name: </label>
                        <div class="col-md-7">
                            <input type="text" name="item-name" id="item-name" class="form-type">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories" class="col-md-5">Category: </label>
                        <div class="col-md-7">
                            <select name="category-id" id="category-id" class="form-type">
                                <option> - </option>

                                <?php $rows = $newItem->getCategories();

                                foreach ($rows as $row) {

                                    echo "<option value='" . $row['id'] . "'>" . $row['type'] . "</option>";
                                }

                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="enter-product" class="btn">ENTER PRODUCT</button>
            </div>
            </form>

        </div>
    </div>

</main>

<?php include('_END.php'); ?>