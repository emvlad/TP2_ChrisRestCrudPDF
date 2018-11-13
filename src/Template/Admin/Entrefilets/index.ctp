<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrefilet[]|\Cake\Collection\CollectionInterface $entrefilets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav"> 
        <li>
              <a href="http://localhost/TP2_ChrisRestCrudPDF"/>Mono_page</a>
        </li>
      
    </ul>
</nav>
<div class="entrefilets index large-9 medium-8 columns content">
    <h3><?= __('Entrefilets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('published') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>                
            </tr>
            
        </thead>
        <tbody>
            <?php foreach ($entrefilets as $entrefilet): ?>
                <tr>                 
                    <td><?= h($entrefilet->title) ?></td>
                    <td><?= h($entrefilet->slug) ?></td>
                    <td><?= h($entrefilet->published) ?></td>
                    <td><?= h($entrefilet->created) ?></td>
                    <td><?= h($entrefilet->modified) ?></td>
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
