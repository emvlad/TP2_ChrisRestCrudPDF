<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrefilet $entrefilet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $entrefilet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $entrefilet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gazettes'), ['controller' => 'Gazettes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gazette'), ['controller' => 'Gazettes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets Title Translation'), ['controller' => 'Entrefilets_title_translation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilets Title Translation'), ['controller' => 'Entrefilets_title_translation', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List I18n'), ['controller' => 'I18n', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New I18n'), ['controller' => 'I18n', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Critiqs'), ['controller' => 'Critiqs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Critiq'), ['controller' => 'Critiqs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="entrefilets form large-9 medium-8 columns content">
    <?= $this->Form->create($entrefilet) ?>
    <fieldset>
        <legend><?= __('Edit Entrefilet') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('slug');
            echo $this->Form->control('body');
            echo $this->Form->control('published');
            echo $this->Form->control('theme_id', ['options' => $themes, 'empty' => true]);
            echo $this->Form->control('gazette_id', ['options' => $gazettes, 'empty' => true]);
            echo $this->Form->control('files._ids', ['options' => $files]);
            echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
