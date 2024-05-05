<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_orders WHERE order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode, date) VALUES ($order_id, $invoice_number, $amount, '$payment_mode', NOW())";
    $result = mysqli_query($con, $insert_query);
    if($result){
        echo "<h3 class='text-center'>Paiement effectué avec succès</h3>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";
    }
    $update_orders = "UPDATE user_orders SET order_status='Payée' WHERE order_id=$order_id";
    $result = mysqli_query($con, $update_orders);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Confirmer le paiement</h1>
    <div class="container my-5">
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Montant :</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Selectionnez un moyen de paiement</option>
                    <option>Paypal</option>
                    <option>Par carte bancaire</option>
                </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirmer paiement" class="btn btn-outline-success" name="confirm_payment">
            </div>
        </form>
    </div>
</body>

</html>