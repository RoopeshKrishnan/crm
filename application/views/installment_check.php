<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Installment check</h2>
    <br><br>
    <form action="<?= base_url() ?>installment_billDate" method="get">
       <label for="">Total Amount</label><br>
        <input type="text" name="total_amount">
        <br><br>
        <label for="">Bill Date/Starting Date</label><br>
        <input type="date" name="bill_date" id="bill_date">
        <br><br>
        <label for="example-text-input" class="form-control-label">Installment Types</label><br>
        <select class="select-box form-control " name="installment" id="installment">
            <option value="" selected disabled>--Select--</option>
            <?php
            foreach ($installment as $row) {
                echo '<option value="' . $row->installment_id . '">' . $row->installment_amount .'&nbsp;rs &nbsp;('. $row->repeated_duration .'&nbsp; Days Duration)'. '</option>';
            }
            ?>
        </select>
        <br><br><br><br>
        <input type="submit">
    </form>
</body>

</html>