<?php include('config.php'); ?>
<?php include('admin/display.php'); ?>
<?php include('_START.php'); ?>

<?php session_start();

$object = new Bill;
$bills = (array) $object->getBills();
?>

<?php include('menu.php'); ?>

<main>

    <?php include('header.php'); ?>
    <div class="content">
        <div class="col-sm-7 col-lg-12">
            <table>
                <tr>
                    <th><i class="fas fa-users"></i></th>
                    <th>Store</th>
                    <th>Date</th>
                    <th>Price </th>
                    <th class="center">Preview</th>
                </tr>
                <?php foreach ($bills as $key => $bill) : ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $bill['sname']; ?></td>
                    <td><?php echo date("d. m. Y. - H:i", strtotime($bill['time'])) ?></td>
                    <td><?php

                            echo $object->getBillPrice($bill['id']);

                            ?></td>
                    <td class="center"><a class="preview" value="<?php echo $bill['id']; ?>"><i
                                class="fas fa-money-check-alt"></i></a>
                    </td>

                </tr>
                <?php if ($key == 5) break;
                endforeach ?>
            </table>
        </div>
        <div class="canvas col-lg-12">
            <div class="cover"></div>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>

        </div>
    </div>
</main>

<?php include('src/chart.php'); ?>
<?php include('src/modal.php'); ?>
<?php include('_END.php'); ?>