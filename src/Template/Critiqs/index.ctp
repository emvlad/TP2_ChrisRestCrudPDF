
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiq[]|\Cake\Collection\CollectionInterface $critiqs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('New Critic'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="critiqs index large-9 medium-8 columns content">
    <h3><?= __('Critics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              
                <th scope="col"><?= $this->Paginator->sort('entrefilet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($critiqs as $critiq): ?>
            <tr>
                
                <td><?= $critiq->has('entrefilet') ? $this->Html->link($critiq->entrefilet->title,
                        ['controller' => 'Entrefilets', 'action' => 'view', $critiq->entrefilet->id]) : '' ?></td>
                <td><?= h($critiq->name) ?></td>
                <td><?= h($critiq->created) ?></td>
                <td><?= h($critiq->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $critiq->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $critiq->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $critiq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $critiq->id)]) ?>
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
  /*<th scope="col"><?= $this->Paginator->sort('id') ?></th>
<td><?= $this->Number->format($critiq->id) ?>
</td>
  
?>
   *  * */
  