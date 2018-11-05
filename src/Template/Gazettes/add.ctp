<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gazette $gazette
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gazettes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gazettes form large-9 medium-8 columns content">
    <?= $this->Form->create($gazette) ?>
    <fieldset>
        <legend><?= __('Add Gazette') ?></legend>
        <?php
            echo $this->Form->control('dynamique');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
