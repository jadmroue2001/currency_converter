<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Currency $currency
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Currency'), ['action' => 'edit', $currency->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Currency'), ['action' => 'delete', $currency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Currencies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Currency'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="currencies view content">
            <h3><?= h($currency->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($currency->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($currency->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Buyat') ?></th>
                    <td><?= $this->Number->format($currency->buyat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sellat') ?></th>
                    <td><?= $this->Number->format($currency->sellat) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
