<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Currency $currency
 */
?>
<style>
  /* General Styles */
body {
    font-family: 'Lato', sans-serif;
    color: #333;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.row {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.column {
    margin: 10px;
}

.column-80 {
    width: 100%; /* Adjust to take full width */
    max-width: 800px; /* Set a max width to control the size */
}

/* Title and Button Styles */
.side-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.side-nav legend {
    font-size: 28px; /* Reduced font size */
    color: #333;
    margin: 0;
}

.side-nav .side-nav-item {
    background-color: #006400; /* Dark Green */
    color: white;
    padding: 8px 12px; /* Reduced padding */
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px; /* Reduced font size */
    transition: background-color 0.3s ease;
    border: none;
    text-align: center;
    white-space: nowrap; /* Ensure the button text stays on one line */
}

.side-nav .side-nav-item:hover {
    background-color: #004b23; /* Darker Green on hover */
}

/* Form Styling */
.currencies.form.content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
}

.currencies.form.content fieldset {
    border: none;
    padding: 0;
    margin-bottom: 20px;
}

.currencies.form.content .form-control {
    width: 100%;
    padding: 8px; /* Reduced padding */
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px; /* Reduced font size */
}

.currencies.form.content .btn-primary {
    background-color: #006400; /* Dark Green */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px; /* Reduced font size */
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}

.currencies.form.content .btn-primary:hover {
    background-color: #004b23; /* Darker Green on hover */
}

</style>

<div class="row">
    <div class="column column-80">
        <div class="currencies form content">
            <?= $this->Form->create($currency) ?>
            <fieldset>
                <div class="side-nav">
                    <legend><?= __('Add Currency') ?></legend>
                    <?= $this->Html->link(__('List Currencies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
                <?php
                echo $this->Form->control('code', ['class' => 'form-control']);
                echo $this->Form->control('buyat', ['class' => 'form-control']);
                echo $this->Form->control('sellat', ['class' => 'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
