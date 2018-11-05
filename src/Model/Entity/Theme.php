<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Theme Entity
 *
 * @property int $id
 * @property string $sujet
 * @property int $genre_id
 *
 * @property \App\Model\Entity\Genre $genre
 * @property \App\Model\Entity\Entrefilet[] $entrefilets
 */
class Theme extends Entity
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
        'sujet' => true,
        'genre_id' => true,
        'genre' => true,
        'entrefilets' => true
    ];
}
