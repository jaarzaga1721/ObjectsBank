<?php
require_once __DIR__ . '/Account.php';
require_once __DIR__ . '/Customer.php';

/* Step 7: FOUR account objects */
$accounts = [
    new Account(20489446, "Checking", -20),
    new Account(20148896, "Savings", 380),
    new Account(30987421, "Payroll", 15000),
    new Account(40122389, "Investment", -500)
];

/* Step 8: Customer object */
$customer = new Customer("Jemieryn", "Arzaga", $accounts);

include __DIR__ . '/header.php';
?>

<!-- Step 9 -->
<div class="name">
    NAME: <?php echo $customer->getFullName(); ?>
</div>

<table>
    <tr>
        <th>ACCOUNT NUMBER</th>
        <th>ACCOUNT TYPE</th>
        <th>BALANCE</th>
    </tr>

    <!-- Steps 10–15 -->
    <?php foreach ($customer->accounts as $account): ?>
        <tr>
            <td><?php echo $account->accountNumber; ?></td>
            <td><?php echo $account->accountType; ?></td>

            <?php if ($account->balance >= 0): ?>
                <td class="credit">
                    ₱<?php echo number_format($account->balance, 2); ?>
                </td>
            <?php else: ?>
                <td class="overdrawn">
                    ₱<?php echo number_format($account->balance, 2); ?>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/footer.php'; ?>
