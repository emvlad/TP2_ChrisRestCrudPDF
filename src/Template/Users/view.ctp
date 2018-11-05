<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= "User Information" ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Email Confirm') ?></th>
            <td><?= $user->email_confirm ? __('Yes') : __('No'); ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Uuid') ?></th>
            <td><?= h($user->user_uuid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Record Num') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role_id) ?> </td>


        </tr>

        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Related Entrefilets') ?></h4>
        <?php if (!empty($user->entrefilets)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>           
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Slug') ?></th>
                    <th scope="col"><?= __('Body') ?></th>
                    <th scope="col"><?= __('Published') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->entrefilets as $entrefilets): ?>
                    <tr>

                        <td><?= h($entrefilets->title) ?></td>
                        <td><?= h($entrefilets->slug) ?></td>
                        <td><?= h($entrefilets->body) ?></td>
                        <td><?= h($entrefilets->published) ?></td>
                        <td><?= h($entrefilets->created) ?></td>
                        <td><?= h($entrefilets->modified) ?></td>
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








<?php
/*
 *    <th scope="col"><?= __('Id') ?></th>
  <th scope="col"><?= __('User Id') ?></th>
 * 
 *     <td><?= h($entrefilets->id) ?></td>
  <td><?= h($entrefilets->user_id) ?></td>
 * 
 * 
 */
?>