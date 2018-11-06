<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrefilet[]|\Cake\Collection\CollectionInterface $entrefilets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        
         <li><?= $this->Html->link(__('List Category'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gazettes'), ['controller' => 'Gazettes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gazette'), ['controller' => 'Gazettes', 'action' => 'add']) ?></li>

        <li><?= $this->Html->link(__('List Critiqs'), ['controller' => 'Critiqs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Critiq'), ['controller' => 'Critiqs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="entrefilets index large-9 medium-8 columns content">
    <h3><?= __('Entrefilets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('published') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('theme_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gazette_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entrefilets as $entrefilet): ?>
            <tr>
                <td><?= $this->Number->format($entrefilet->id) ?></td>
                <td><?= $entrefilet->has('user') ? $this->Html->link($entrefilet->user->id, ['controller' => 'Users', 'action' => 'view', $entrefilet->user->id]) : '' ?></td>
                <td><?= h($entrefilet->title) ?></td>
                <td><?= h($entrefilet->slug) ?></td>
                <td><?= h($entrefilet->published) ?></td>
                <td><?= h($entrefilet->created) ?></td>
                <td><?= h($entrefilet->modified) ?></td>
                <td><?= $entrefilet->has('theme') ? $this->Html->link($entrefilet->theme->sujet, ['controller' => 'Themes', 'action' => 'view', $entrefilet->theme->id]) : '' ?></td>
                <td><?= $entrefilet->has('gazette') ? $this->Html->link($entrefilet->gazette->id, ['controller' => 'Gazettes', 'action' => 'view', $entrefilet->gazette->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $entrefilet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $entrefilet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $entrefilet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entrefilet->id)]) ?>
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
