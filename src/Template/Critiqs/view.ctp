
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiq $critiq
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Edit Critic'), ['action' => 'edit', $critiq->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Critic'), ['action' => 'delete', $critiq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $critiq->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Critics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Critic'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets',
            'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets',
            'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="critiqs view large-9 medium-8 columns content">
    <h2><?= h($critiq->full_name) ?></h2>
    
     <h3>Critics Details</h3>
     
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Entrefilet') ?></th>
            <td><?= $critiq->has('entrefilet') ? $this->Html->link($critiq->entrefilet->title, ['controller' => 'Entrefilets',
                'action' => 'view', $critiq->entrefilet->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('full_name') ?></th>
            <td><?= h($critiq->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($critiq->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($critiq->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($critiq->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Critic') ?></h4>
        <?= $this->Text->autoParagraph(h($critiq->critiq)); ?>
    </div>
</div>
