<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gazette $gazette
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gazette->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gazette->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Gazettes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gazettes form large-9 medium-8 columns content">
    <?= $this->Form->create($gazette) ?>
    <fieldset>
        <legend><?= __('Edit Gazette') ?></legend>
        <?php
            echo $this->Form->control('dynamique');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
