<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrefilet $entrefilet
 */
?>


<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Themes", "action" => "findByGenre", "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Entrefilets/add', ['block' => 'scriptBottom']);

?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Entrefilets'), ['action' => 'index']) ?></li>
        
         <li><?= $this->Html->link(__('List Category'), ['controller' => 'Genres', 'action' => 'index']) ?></li>

        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gazettes'), ['controller' => 'Gazettes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gazette'), ['controller' => 'Gazettes', 'action' => 'add']) ?></li>

     
    </ul>
</nav>
<div class="entrefilets form large-9 medium-8 columns content">
    <?= $this->Form->create($entrefilet) ?>
    <fieldset>
        <legend><?= __('Add Entrefilet') ?></legend>
        <?php
        // echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);

        
        echo $this->Form->control('genre_id', ['options' => $genres]);
        echo $this->Form->control('theme_id', ['options' => $themes]);
        
        echo $this->Form->control('title');
        echo $this->Form->control('slug');
        echo $this->Form->control('body');
        
        
         //affich field_dynamique?
        // echo $this->Form->control('gazette_id', ['options' => $gazettes]);
        
        echo $this->Form->control('published');


        echo $this->Form->control('files._ids', ['options' => $files]);
        echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
