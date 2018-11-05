
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Add Tag') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('entrefilets._ids', ['options' => $entrefilets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
