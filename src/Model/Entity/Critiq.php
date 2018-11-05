<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Critiq Entity
 *
 * @property int $id
 * @property int $entrefilet_id
 * @property string $full_name
 * @property string $critiq
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CritiqsCritiqTranslation $critiq_translation
 * @property \App\Model\Entity\I18n[] $_i18n
 * @property \App\Model\Entity\Entrefilet $entrefilet
 */
class Critiq extends Entity
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
        'entrefilet_id' => true,
        'full_name' => true,
        'critiq' => true,
        'created' => true,
        'modified' => true,
        'critiq_translation' => true,
        '_i18n' => true,
        'entrefilet' => true
    ];
}
