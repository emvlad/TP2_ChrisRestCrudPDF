
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiq $critiq
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $critiq->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $critiq->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Critics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="critiqs form large-9 medium-8 columns content">
    <?= $this->Form->create($critiq) ?>
    <fieldset>
        <legend><?= __('Edit Critiq') ?></legend>
        <?php
            echo $this->Form->control('entrefilet_id', ['options' => $entrefilets]);
            echo $this->Form->control('full_name');
            echo $this->Form->control('critics');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Apply')) ?>
    <?= $this->Form->end() ?>
</div>
