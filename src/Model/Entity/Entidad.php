<?php
namespace Ypunto\Admin\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entidad Entity
 *
 * @property int $id
 * @property int $grupo_id
 * @property string $nombre
 * @property string $descripcion
 * @property string $email
 * @property string $estado
 * @property bool $habilitado
 * @property \Cake\I18n\FrozenDate $fecha_nacimiento
 * @property \Cake\I18n\FrozenTime $fecha_hora
 * @property int $puntos
 * @property float $capital
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Ypunto\Admin\Model\Entity\Grupo $grupo
 * @property \Ypunto\Admin\Model\Entity\Cosa[] $cosas
 * @property \Ypunto\Admin\Model\Entity\Etiqueta[] $etiquetas
 */
class Entidad extends Entity
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
        'grupo_id' => true,
        'nombre' => true,
        'descripcion' => true,
        'email' => true,
        'estado' => true,
        'habilitado' => true,
        'fecha_nacimiento' => true,
        'fecha_hora' => true,
        'puntos' => true,
        'capital' => true,
        'created' => true,
        'modified' => true,
        'grupo' => true,
        'cosas' => true,
        'etiquetas' => true
    ];
}
