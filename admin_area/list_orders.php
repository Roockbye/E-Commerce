<h3 class="text-center text-success text-black">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Id</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>

    <?php
    $get_orders = "SELECT * FROM `user_orders`";
    $result = mysqli_query($con, $get_orders);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<tr><td colspan='7' class='text-center text-danger'>No orders yet</td></tr>";
    } else {
        $number = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;
            echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td>
                        <a href='#' class='text-light' data-toggle='modal' data-target='#exampleModal$order_id'>
                            <i class='fa-solid fa-trash'></i>
                        </a>
                    </td>
                </tr>";
        }
    }
    ?>

    </tbody>
</table>

<?php
// Modal for confirmation
$get_orders = "SELECT * FROM `user_orders`";
$result = mysqli_query($con, $get_orders);

while ($row_data = mysqli_fetch_assoc($result)) {
    $order_id = $row_data['order_id'];
?>
<div class="modal fade" id="exampleModal<?php echo $order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a href='index.php?delete_orders=<?php echo $order_id; ?>' class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
