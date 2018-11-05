<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
       
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
               <tr>          
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>            
            <?php foreach ($users as $user): ?>  
            
            <tr>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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


<?php
/*
  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
   <td><?= $this->Number->format($user->id) ?></td>
 * 
 * <tr> <th scope="col"><?= $this->Paginator->sort('user_uuid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_confirm') ?></th></tr>
    <tr> 
 * 
 * 
 *    <tr><td><td><?= h($user->user_uuid) ?></td></td>
                <td><?= h($user->email_confirm) ?></td></tr>
         
 *  
 * */
    ?>