<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entrefilet Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property bool $published
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $theme_id
 * @property int $gazette_id
 *
 * @property \App\Model\Entity\EntrefiletsTitleTranslation $title_translation
 * @property \App\Model\Entity\I18n[] $_i18n
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Critiq[] $critiqs
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Theme $theme
 * @property \App\Model\Entity\Gazette $gazette
 * @property \App\Model\Entity\Tag[] $tags
 */
class Entrefilet extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'slug' => true,
        'body' => true,
        'published' => true,
        'created' => true,
        'modified' => true,
        'theme_id' => true,
        'gazette_id' => true,
        'title_translation' => true,
        '_i18n' => true,
        'user' => true,
        'critiqs' => true,
        'files' => true,
        'theme' => true,
        'gazette' => true,
        'tags' => true
    ];
}
