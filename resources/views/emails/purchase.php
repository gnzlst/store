<!DOCTYPE html>
<html>
<head>
    <title>Purchase</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="author" content="Gonzalo Soto">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div style="width: 600px; padding: 15px; margin: 0 auto;">

    <div style="text-align: center;">
        <img src="https://files.stripe.com/files/f_test_W6xnhC2O8BJFGjBFDwA2wqdY" width="auto" height="80"/>
    </div>

    <h2 style="color: #d23600;">Hello <?= user()->full_name ?>,</h2>
    <p>Your order confirmation details: <span style="color: #0b97c4;">
                #<?= $data['order_no'] ?>
            </span>
    </p>

    <table cellspacing="5" cellpadding="5" border="0" width="600" style="border: 1px solid #0a0a0a;">
        <tr style="background-color: #000000; color: #ffffff;">
            <th style="text-align: left;">Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php foreach ($data['product'] as $item): ?>
            <tr>
                <td width="400"><?= $item['name'] ?></td>
                <td width="100">$<?= $item['price'] ?></td>
                <td width="50"><?= $item['quantity'] ?></td>
                <td width="50">$<?= $item['total'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h4>Total Amount: $<?= $data['total'] ?></h4>

    <p>We hope to see you again.</p>
    <h2>PCFactory Ecommerce Store.</h2>
</div>
</body>
</html>