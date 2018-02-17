<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblUsuarios".
 *
 * @property int $idUsuario
 * @property string $nome
 * @property string $sobrenome
 * @property string $dataNascimento
 * @property string $sexo
 * @property string $email
 * @property string $cpf
 *
 * @property TblAtendimentos[] $tblAtendimentos
 * @property TblFisioterapeutas[] $tblFisioterapeutas
 */
class TblUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblUsuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sobrenome', 'dataNascimento', 'sexo', 'email', 'cpf'], 'required'],
            [['dataNascimento'], 'safe'],
            [['nome'], 'string', 'max' => 30],
            [['sobrenome', 'email'], 'string', 'max' => 50],
            [['sexo'], 'string', 'max' => 1],
            [['cpf'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'dataNascimento' => 'Data Nascimento',
            'sexo' => 'Sexo',
            'email' => 'Email',
            'cpf' => 'Cpf',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAtendimentos()
    {
        return $this->hasMany(TblAtendimentos::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblFisioterapeutas()
    {
        return $this->hasMany(TblFisioterapeutas::className(), ['idUsuario' => 'idUsuario']);
    }
}
