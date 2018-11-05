<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrefilet $entrefilet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Entrefilet'), ['action' => 'edit', $entrefilet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Entrefilet'), ['action' => 'delete', $entrefilet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entrefilet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gazettes'), ['controller' => 'Gazettes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gazette'), ['controller' => 'Gazettes', 'action' => 'add']) ?> </li>
        
        <li><?= $this->Html->link(__('List Critiqs'), ['controller' => 'Critiqs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Critiq'), ['controller' => 'Critiqs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="entrefilets view large-9 medium-8 columns content">
    <h3><?= h($entrefilet->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $entrefilet->has('user') ? $this->Html->link($entrefilet->user->id, ['controller' => 'Users', 'action' => 'view', $entrefilet->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($entrefilet->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($entrefilet->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Theme') ?></th>
            <td><?= $entrefilet->has('theme') ? $this->Html->link($entrefilet->theme->sujet, ['controller' => 'Themes', 'action' => 'view', $entrefilet->theme->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gazette') ?></th>
            <td><?= $entrefilet->has('gazette') ? $this->Html->link($entrefilet->gazette->id, ['controller' => 'Gazettes', 'action' => 'view', $entrefilet->gazette->id]) : '' ?></td>
        </tr>
      
       
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($entrefilet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($entrefilet->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $entrefilet->published ? __('Yes') : __('No'); ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('No.') ?></th>
            <td><?= $this->Number->format($entrefilet->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($entrefilet->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($entrefilet->files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Slide') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($entrefilet->files as $files): ?>
            <tr>
                <td><?= h($files->id) ?></td>
                <td><?= h($files->slide) ?></td>
                <td><?= h($files->path) ?></td>
                <td><?= h($files->created) ?></td>
                <td><?= h($files->modified) ?></td>
                <td><?= h($files->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($entrefilet->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($entrefilet->tags as $tags): ?>
            <tr>
                <td><?= h($tags->id) ?></td>
                <td><?= h($tags->title) ?></td>
                <td><?= h($tags->created) ?></td>
                <td><?= h($tags->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
   
    <div class="related">
        <h4><?= __('Related Critiqs') ?></h4>
        <?php if (!empty($entrefilet->critiqs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Entrefilet Id') ?></th>
                <th scope="col"><?= __('Full Name') ?></th>
                <th scope="col"><?= __('Critiq') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($entrefilet->critiqs as $critiqs): ?>
            <tr>
                <td><?= h($critiqs->id) ?></td>
                <td><?= h($critiqs->entrefilet_id) ?></td>
                <td><?= h($critiqs->full_name) ?></td>
                <td><?= h($critiqs->critiq) ?></td>
                <td><?= h($critiqs->created) ?></td>
                <td><?= h($critiqs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Critiqs', 'action' => 'view', $critiqs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Critiqs', 'action' => 'edit', $critiqs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Critiqs', 'action' => 'delete', $critiqs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $critiqs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
