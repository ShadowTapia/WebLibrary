<?php

namespace common\models\historico;

use Yii;
use common\models\users\Users;
use common\models\ejemplar\Ejemplar;

/**
 * This is the model class for table "historico".
 *
 * @property string $idhistorico
 * @property string|null $idUser
 * @property string|null $idejemplar
 * @property string|null $fechapres
 * @property string|null $fechadev
 * @property string|null $fechadevReal
 * @property string|null $observacion
 * @property string|null $User
 * @property string|null $UserMail
 *
 * @property Users $idUser0
 * @property Ejemplar $idejemplar0
 */
class Historico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idhistorico'], 'required'],
            [['fechapres', 'fechadev', 'fechadevReal'], 'safe'],
            [['idhistorico', 'idUser', 'idejemplar'], 'string', 'max' => 15],
            [['observacion'], 'string', 'max' => 255],
            [['User', 'UserMail'], 'string', 'max' => 150],
            [['idhistorico'], 'unique'],
            [['idejemplar'], 'exist', 'skipOnError' => true, 'targetClass' => Ejemplar::class, 'targetAttribute' => ['idejemplar' => 'idejemplar']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['idUser' => 'idUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idhistorico' => 'Idhistorico',
            'idUser' => 'Id User',
            'idejemplar' => 'Idejemplar',
            'fechapres' => 'Fechapres',
            'fechadev' => 'Fechadev',
            'fechadevReal' => 'Fechadev Real',
            'observacion' => 'Observacion',
            'User' => 'User',
            'UserMail' => 'User Mail',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(Users::class, ['idUser' => 'idUser']);
    }

    /**
     * Gets query for [[Idejemplar0]].
     *
     * @return \yii\db\ActiveQuery|EjemplarQuery
     */
    public function getIdejemplar0()
    {
        return $this->hasOne(Ejemplar::class, ['idejemplar' => 'idejemplar']);
    }

    /**
     * {@inheritdoc}
     * @return HistoricoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HistoricoQuery(get_called_class());
    }
}
