<?php

namespace common\models\user;

use Yii;
use common\models\roles\Roles;

/**
 * This is the model class for table "user".
 *
 * @property string $idUser
 * @property string|null $UserName
 * @property string|null $UserLastName
 * @property string|null $UserPass
 * @property int|null $Idroles
 * @property int|null $UserRut
 * @property string|null $UserMail
 * @property string|null $authkey
 * @property string|null $accessToken
 * @property int|null $expire_at token expiration time
 * @property string|null $activate
 * @property string|null $verification_code
 *
 * @property Roles $idroles
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser'], 'required'],
            [['Idroles', 'UserRut', 'expire_at'], 'integer'],
            [['activate'], 'string'],
            [['idUser'], 'string', 'max' => 15],
            [['UserName', 'UserLastName'], 'string', 'max' => 45],
            [['UserPass'], 'string', 'max' => 700],
            [['UserMail'], 'string', 'max' => 150],
            [['authkey', 'accessToken', 'verification_code'], 'string', 'max' => 255],
            [['UserRut'], 'unique'],
            [['idUser'], 'unique'],
            [['Idroles'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['Idroles' => 'idroles']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'UserName' => 'User Name',
            'UserLastName' => 'User Last Name',
            'UserPass' => 'User Pass',
            'Idroles' => 'Idroles',
            'UserRut' => 'User Rut',
            'UserMail' => 'User Mail',
            'authkey' => 'Authkey',
            'accessToken' => 'Access Token',
            'expire_at' => 'Expire At',
            'activate' => 'Activate',
            'verification_code' => 'Verification Code',
        ];
    }

    /**
     * Gets query for [[Idroles]].
     *
     * @return \yii\db\ActiveQuery|RolesQuery
     */
    public function getIdroles()
    {
        return $this->hasOne(Roles::class, ['idroles' => 'Idroles']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
