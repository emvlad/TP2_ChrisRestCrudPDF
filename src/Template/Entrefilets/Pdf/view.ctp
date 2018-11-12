
<div class="entrefilets view large-9 medium-8 columns content">
    <h3><?= h($entrefilet->title) ?></h3>
    <table class="vertical-table">
      
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($entrefilet->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($entrefilet->slug) ?></td>
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
               
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>