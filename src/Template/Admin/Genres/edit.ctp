<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $genre->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $genre->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($genre); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Genre']) ?></legend>
    <?php
    echo $this->Form->control('genre');
    echo $this->Form->control('classification');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
