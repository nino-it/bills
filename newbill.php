<?php include('config.php'); ?>
<?php include('admin/display.php'); ?>
<?php include('_START.php'); ?>

<?php session_start();

$object = new Bill;

?>

<?php include('menu.php'); ?>

<main>

    <?php include('header.php'); ?>
    <div class="content">
        <div class="col-md-6 col-lg-4">
            <div class="card">

                <div class="card-header"><strong>Enter new reciept</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="stores" class="col-md-3">Store: </label>
                        <div class="col-md-9">
                            <select name="stores" id="stores" class="form-type">
                                <option> - </option>

                                <?php $rows = $object->getStore('0');

                                foreach ($rows as $row) {

                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datetime" class="col-md-3">Time: </label>
                        <!-- <input type="datetime-local" id="time" name="time"> -->
                        <div class="col-md-9">
                            <input type="date" id="date" class="form-type">
                            <input type="time" id="time" class="form-type">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product-search" class="col-md-3">Product: </label>
                        <div class="col-md-9">
                            <input type="text" id="items" class="form-type">
                            <div class="output-box">
                                <span id="output"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="col-md-3">Quantity: </label>
                        <div class="col-md-9">
                            <input type="text" id="quantity" class="form-type">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-md-3">Price: </label>
                        <div class="col-md-9">
                            <input type="text" id="price" class="form-type">
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button id="next-item" class="btn">Next Item</button>
                    <button id="preview-bill" class="btn">Preview Bill</button>
                    <button id="btn" class="btn">Enter Bill</button>
                    <input type="hidden" id="str" name="str" value="" class="form-type">
                </div>

            </div>
        </div>

        <div class="col-md-5 col-lg-4">
            <div class="list col-sm">
                <div class="todo-item">
                    <ul id="list">
                        <!-- List items -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <!-- bill output -->
            <div class="modal-body">
            </div>
        </div>

    </div>
</main>

<script src="../src/items.js"></script>

<!-- AJAX -->
<?php include('src/search.php'); ?>
<?php include('src/index.php'); ?>

<?php include('_END.php'); ?>