<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblServicos".
 *
 * @property int $idServico
 * @property string $nome
 * @property string $descricao
 * @property string $Preco
 *
 * @property TblAtendimentos[] $tblAtendimentos
 */
class TblServicos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblServicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'Preco'], 'required'],
            [['Preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idServico' => 'Id Servico',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'Preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAtendimentos()
    {
        return $this->hasMany(TblAtendimentos::className(), ['idServico' => 'idServico']);
    }
}
