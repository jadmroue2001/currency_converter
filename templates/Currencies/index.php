<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Currency> $currencies
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

    .currencies.index.content {
        max-width: 900px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .currencies.index.content h3 {
        color: #333; /* Neutral color */
        font-size: 28px;
        display: inline-block;
        margin-right: 20px;
    }

    /* Button Styles */
    .currencies.index.content .button {
        background-color: #006400; /* Dark Green */
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        margin-bottom: 20px;
        display: inline-block;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
        float: right;
        margin-top: -8px;
    }

    .currencies.index.content .button:hover {
        background-color: #004b23; /* Darker Green on hover */
    }

    /* Table Styles */
    .currencies.index.content .table-responsive {
        margin-top: 20px;
    }

    .currencies.index.content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .currencies.index.content th,
    .currencies.index.content td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .currencies.index.content th {
        background-color: white; /* Removed background color */
        color: #333;
        font-weight: bold;
    }

    .currencies.index.content td.actions a {
        /* margin: 0 5px; */
        color: #006400; /* Dark Green */
        text-decoration: none;
        font-weight: bold;
    }

    .currencies.index.content td.actions a:hover {
        color: #004b23; /* Darker Green on hover */
    }

    /* Paginator Styles */
    .currencies.index.content .paginator {
        text-align: center;
        margin-top: 20px;
    }

    .currencies.index.content .pagination {
        display: inline-flex; /* Ensure buttons are side by side */
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .currencies.index.content .pagination li {
        display: inline;
    }

    .currencies.index.content .pagination li a {
        color: #006400; /* Dark Green */
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
        margin: 0 2px;
        border-radius: 5px;
    }

    .currencies.index.content .pagination li a:hover {
        background-color: #e9f5e9; /* Light Green */
    }

    .currencies.index.content .pagination li.active a {
        background-color: #006400; /* Dark Green */
        color: white;
        border: 1px solid #006400;
    }

    .currencies.index.content .paginator p {
        color: #333;
        font-size: 14px;
        margin-top: 10px;
    }
</style>


<div class="currencies index content">
    <?= $this->Html->link(__('New Currency'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Currencies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('buyat') ?></th>
                    <th><?= $this->Paginator->sort('sellat') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currencies as $currency): ?>
                <tr>
                    <td><?= $this->Number->format($currency->id) ?></td>
                    <td><?= h($currency->code) ?></td>
                    <td><?= $this->Number->format($currency->buyat) ?></td>
                    <td><?= $this->Number->format($currency->sellat) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $currency->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $currency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>