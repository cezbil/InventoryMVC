<?php include dirname(__DIR__) .  '\layouts\header.php'; ?>
<?php include dirname(__DIR__) .  '\layouts\nav.php'; ?>


<div style="margin-top: 35px" class="container">

    <div class="col-sm-4 col-sm-offset-4">
        <form id="editProduct" method="post">
            <h2 >Edit Product</h2>
            <label for="inputPartNumber">Part Number</label>
            <input name="partNumber" type="text" id="inputPartNumber" class="form-control" placeholder="Part Number" required autofocus>

            <label for="inputImageURL">Image URL</label>
            <input name="imageURL" type="text" id="inputImageURL" class="form-control" placeholder="Image URL" required>


            <label for="inputStockQuantity">Stock Quantity</label>
            <input name="stock_quantity" type="text" id="inputStockQuantity" class="form-control" placeholder="stock quantity"  required>


            <label for="cost_price">Cost Price</label>
            <input name="cost_price" type="text" id="cost_price" class="form-control" placeholder="cost price" required>



            <label for="selling_price">Selling Price</label>
            <input name="selling_price" type="text" id="selling_price" class="form-control" placeholder="cost price"  required>

            <label for="vat_rate">Vat Rate</label>
            <input name="vat_rate" type="text" id="vat_rate" class="form-control" placeholder="cost price"  required>



            <label for="inputDesc">Description</label>
            <textarea class="form-control" name="description" form="editProduct" rows="3">
            </textarea>

            <br>
            <button name="btn-add" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
        </form>
    </div>
</div>

<?php include_once '/../layouts/footer.php'; ?>
