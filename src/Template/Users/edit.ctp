<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$urlToCarsAutocompletedemoJson = $this->Url->build([
    "controller" => "Users", "action" => "findUsers", "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteFullName = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Users/add', ['block' => 'scriptBottom']);
echo $this->Html->script('Users/autocomplete', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Form->postLink(__('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['controller' => 'Entrefilets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entrefilet'), ['controller' => 'Entrefilets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Add Role'), ['controller' => 'Roles','action' => 'add']) ?></li>
        
      
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('full_name',['id' => 'autocomplete']);
                  
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('email_confirm');
            echo $this->Form->control('user_uuid');
            
         
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
