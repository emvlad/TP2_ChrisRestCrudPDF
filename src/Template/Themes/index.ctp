<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme[]|\Cake\Collection\CollectionInterface $themes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="themes index large-9 medium-8 columns content">
    <h3><?= __('Themes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sujet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genre_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themes as $theme): ?>
            <tr>
                <td><?= $this->Number->format($theme->id) ?></td>
                <td><?= h($theme->sujet) ?></td>
                <td><?= $theme->has('genre') ? $this->Html->link($theme->genre->id, ['controller' => 'Genres', 'action' => 'view', $theme->genre->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $theme->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $theme->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $theme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
