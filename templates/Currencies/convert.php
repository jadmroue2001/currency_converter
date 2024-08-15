// templates/Currencies/list_codes.php

<h1>Currency Converter Calculator</h1>

<?= $this->Form->create(null, ['type' => 'post']) ?>

<?= $this->Form->radio('option', [
    ['value' => '1', 'text' => 'I Want to Sell', 'id' => 'sellToggle'],
    ['value' => '0', 'text' => 'I Want to Buy', 'id' => 'buyToggle']
], ['hiddenField' => false]) ?>

<?= $this->Form->control('code', [
    'type' => 'select',
    'options' => $currencies,
    'label' => 'Select Currency Code'
]) ?>

<?= $this->Form->control('amount', ['label' => 'Total Amount to buy']) ?>
<?= $this->Form->button(__('Calculate')) ?>
<?= $this->Form->end() ?>

<?php if ($selectedCurrency) : ?>
    <h2>Results for <?= h($selectedCurrency->code) ?></h2>
    <ul>
        <li>Amount: <?= h($this->request->getData('amount')) ?></li>
        <?= $x ?>
        <!-- <li>Converted Amount (Buy At): <?= h($buyResult) ?></li>
        <li>Converted Amount (Sell At): <?= h($sellResult) ?></li> -->
    </ul>
<?php endif; ?>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">1</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>

<!--
we sell
1.4
we buy
1.348 
-->


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
<div class="b">
    <?php
    // Database connection variables
    ?>
</div>

</html>