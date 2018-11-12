
<h1>
    Entrefilets tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
    <?php foreach ($entrefilets as $entrefilet): ?>
        <entrefilet>
            <!-- Use the HtmlHelper to create a link -->
            <h4><?=
                $this->Html->link(
                        $entrefilet->title, ['controller' => 'Entrefilets', 
                            'action' => 'view', $entrefilet->slug]
                )
                ?></h4>
            <span><?= h($entrefilet->created) ?>
        </entrefilet>
<?php endforeach; ?>
</section>