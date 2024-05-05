<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM user_table WHERE username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    // echo $user_id;
    ?>

    <h3 class="text-center">Toutes mes commandes</h3>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>SI no</th>
                <th>Montant dû</th>
                <th>Total des produits</th>
                <th>Numéro de facture</th>
                <th>Date</th>
                <th>Payée / En attente</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $get_order_details = "SELECT * FROM user_orders WHERE user_id='$user_id'";
            $result_orders = mysqli_query($con, $get_order_details);
            $number = 1;

            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                if ($order_status == 'En attente') {
                    $order_status = 'En attente';
                } else {
                    $order_status = 'Payée';
                }
                $order_date = $row_orders['order_date'];
                echo "
        <tr>
        <th>$number</th>
        <th>$amount_due</th>
        <th>$total_products</th>
        <th>$invoice_number</th>
        <th>$order_date</th>
        <th>$order_status</th>";
            ?>

            <?php
                if ($order_status == 'Payée') {
                    echo "<td>Payée</td>";
                } else {
                    echo "
            <td><a href='confirm_payment.php?order_id=$order_id'>Payer</a></td></tr>
        </tr>";
                }
                $number++;
            }
            ?>
        </tbody>
    </table>
    </form>
</body>

</html>