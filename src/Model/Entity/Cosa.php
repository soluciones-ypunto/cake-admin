<?php
namespace Ypunto\Admin\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cosa Entity
 *
 * @property int $id
 * @property int $entidad_id
 * @property string $nombre
 * @property string $descripcion
 * @property float $precio
 * @property int $cantidad
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Ypunto\Admin\Model\Entity\Entidad $entidad
 */
class Cosa extends Entity
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
        'entidad_id' => true,
        'nombre' => true,
        'descripcion' => true,
        'precio' => true,
        'cantidad' => true,
        'created' => true,
        'modified' => true,
        'entidad' => true
    ];
}
