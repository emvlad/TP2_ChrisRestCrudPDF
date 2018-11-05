<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre $genre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Genre'), ['action' => 'edit', $genre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Genre'), ['action' => 'delete', $genre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genres view large-9 medium-8 columns content">
    <h3><?= h($genre->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= h($genre->genre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($genre->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Themes') ?></h4>
        <?php if (!empty($genre->themes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sujet') ?></th>
                <th scope="col"><?= __('Genre Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genre->themes as $themes): ?>
            <tr>
                <td><?= h($themes->id) ?></td>
                <td><?= h($themes->sujet) ?></td>
                <td><?= h($themes->genre_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Themes', 'action' => 'view', $themes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Themes', 'action' => 'edit', $themes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Themes', 'action' => 'delete', $themes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $themes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
