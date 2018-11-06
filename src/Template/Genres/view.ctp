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
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genres view large-9 medium-8 columns content">
    <h3><?= h($genre->genre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= h($genre->genre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= h($genre->classification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($genre->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Entrefilets') ?></h4>
        <?php if (!empty($genre->entrefilets)): ?>
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
                <th scope="col"><?= __('Gazette Id') ?></th>
                <th scope="col"><?= __('File Id') ?></th>
                <th scope="col"><?= __('Genre Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genre->entrefilets as $entrefilets): ?>
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
                <td><?= h($entrefilets->gazette_id) ?></td>
                <td><?= h($entrefilets->file_id) ?></td>
                <td><?= h($entrefilets->genre_id) ?></td>
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
