<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gazette $gazette
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gazette'), ['action' => 'edit', $gazette->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gazette'), ['action' => 'delete', $gazette->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gazette->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gazettes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gazette'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gazettes view large-9 medium-8 columns content">
    <h3><?= h($gazette->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dynamique') ?></th>
            <td><?= h($gazette->dynamique) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gazette->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gazette->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gazette->modified) ?></td>
        </tr>
    </table>
</div>
