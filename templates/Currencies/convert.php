// templates/Currencies/list_codes.php

<h1>Currency Converter Calculator</h1>

<?= $this->Form->create(null, ['type' => 'post']) ?>
<?= $this->Form->control('code', [
    'type' => 'select',
    'options' => $currencies,
    'label' => 'Select Currency Code'
]) ?>
<?= $this->Form->control('amount', ['label' => 'Amount to Convert']) ?>
<?= $this->Form->button(__('Calculate')) ?>
<?= $this->Form->end() ?>

<?php if ($selectedCurrency): ?>
    <h2>Results for <?= h($selectedCurrency->code) ?></h2>
    <ul>
        <li>Amount: <?= h($this->request->getData('amount')) ?></li>
        <li>Converted Amount (Buy At): <?= h($buyResult) ?></li>
        <li>Converted Amount (Sell At): <?= h($sellResult) ?></li>
    </ul>
<?php endif; ?>

<html>
<style>
.b {
  width: 320px;
  height: 50px;
  padding: 10px;
  border: 5px solid gray;
  margin: 0;
}
</style>
    <div class="b" >
    <?php
// Database connection variables

?>


    </div>
</html>