<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Genre'), ['action' => 'edit', $genre->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Genre'), ['action' => 'delete', $genre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]) ?> </li>
<li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Genre'), ['action' => 'add']) ?> </li>
<li><?=
    $this->Html->link('Admin LineUp', [
        'prefix' => false,
        'controller' => 'Genres',
        'action' => 'index'
    ]);
    ?>
</li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($genre->genre) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Genre') ?></td>
            <td><?= h($genre->genre) ?></td>
        </tr>
        <tr>
            <td><?= __('Classification') ?></td>
            <td><?= h($genre->classification) ?></td>
        </tr>
      
      
    </table>
</div>

