<?php

namespace common\models\roles;

use Yii;
use common\models\users\Users;
use common\models\user\User;

/**
 * This is the model class for table "roles".
 *
 * @property int $idroles
 * @property string|null $nombre
 * @property string|null $descripcion
 *
 * @property User[] $users
 * @property Users[] $users0
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 30],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idroles' => 'Idroles',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['Idroles' => 'idroles']);
    }

    /**
     * Gets query for [[Users0]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::class, ['Idroles' => 'idroles']);
    }

    /**
     * {@inheritdoc}
     * @return RolesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RolesQuery(get_called_class());
    }
}
