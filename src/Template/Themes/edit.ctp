<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $theme->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="themes form large-9 medium-8 columns content">
    <?= $this->Form->create($theme) ?>
    <fieldset>
        <legend><?= __('Edit Theme') ?></legend>
        <?php
            echo $this->Form->control('sujet');
            echo $this->Form->control('genre_id', ['options' => $genres, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
