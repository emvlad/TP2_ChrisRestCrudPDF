<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Theme'), ['action' => 'edit', $theme->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Theme'), ['action' => 'delete', $theme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="themes view large-9 medium-8 columns content">
    <h3><?= h($theme->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sujet') ?></th>
            <td><?= h($theme->sujet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= $theme->has('genre') ? $this->Html->link($theme->genre->id, ['controller' => 'Genres', 'action' => 'view', $theme->genre->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($theme->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Entrefilets') ?></h4>
        <?php if (!empty($theme->entrefilets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Theme Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($theme->entrefilets as $entrefilets): ?>
            <tr>
                <td><?= h($entrefilets->id) ?></td>
                <td><?= h($entrefilets->user_id) ?></td>
                <td><?= h($entrefilets->title) ?></td>
                <td><?= h($entrefilets->slug) ?></td>
                <td><?= h($entrefilets->body) ?></td>
                <td><?= h($entrefilets->published) ?></td>
                <td><?= h($entrefilets->created) ?></td>
                <td><?= h($entrefilets->modified) ?></td>
                <td><?= h($entrefilets->theme_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Entrefilets', 'action' => 'view', $entrefilets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Entrefilets', 'action' => 'edit', $entrefilets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entrefilets', 'action' => 'delete', $entrefilets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entrefilets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
