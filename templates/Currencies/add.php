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
            <?= $this->Html->link(__('List Currencies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="currencies form content">
            <?= $this->Form->create($currency) ?>
            <fieldset>
                <legend><?= __('Add Currency') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('buyat');
                    echo $this->Form->control('sellat');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
