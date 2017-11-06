<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Universe Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $characteristics
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 */
class Universe extends Entity
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
        '*' => true,
        'id' => false
    ];
    
    protected $_virtual = ['name_weight'];
    //protected $_hidden = ['password'];

    protected function _getNameWeight()
    {
        return $this->_properties['name'] . '***' .
            $this->_properties['weight'];
    }

}
