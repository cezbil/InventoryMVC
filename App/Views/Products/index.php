<?php include dirname(__DIR__) .  '\layouts\header.php'; ?>
<?php include dirname(__DIR__) .  '\layouts\nav.php'; ?>

<div style="margin-top: 50px" class="container">
    <h2 class="sub-header">Product List Report</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>IMG</th>
                <th>Part Number</th>
                <th>Dexription</th>
                <th>Stock Quantity</th>
                <th>Cost Price</th>
                <th>Selling Price</th>
                <th>VAT rate</th>
                <th colspan="3" align="center">Edit/Delete</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;

            foreach ($products as $product){
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><img height="42" width="42" src="<?php echo htmlspecialchars($product['image'],ENT_QUOTES | ENT_HTML401,'UTF-8');?>"></td>

                    <td><?php echo htmlspecialchars($product['part_number'],ENT_QUOTES | ENT_HTML401,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($product['description'],ENT_QUOTES | ENT_HTML401,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($product['stock_quantity'],ENT_QUOTES | ENT_HTML401,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($product['cost_price'],ENT_QUOTES | ENT_HTML401,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($product['selling_price'],ENT_QUOTES | ENT_HTML401,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($product['vat_rate'],ENT_QUOTES | ENT_HTML401,'UTF-8');?></td>

                    <td>


                        <a href="<?php echo "http://$_SERVER[HTTP_HOST]/products/" . $product['id'] . '/edit'?>" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo "http://$_SERVER[HTTP_HOST]/products/" . $product['id'] . '/view'?>" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            <span><strong>View</strong></span>
                        </a>
                    </td>
                    <td>

                        <a href="<?php echo "http://$_SERVER[HTTP_HOST]/products/" . $product['id']  . '/delete'?>" class="btn btn-danger a-btn-slide-text">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>Delete</strong></span>
                        </a>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include dirname(__DIR__) .  '\layouts\footer.php'; ?>
