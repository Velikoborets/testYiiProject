<?php

namespace app\modules\user\models;

use Yii;
use yii\web\IdentityInterface;
use app\modules\roles\models\Role;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int|null $role_id
 * @property string $telegram_nickname
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username', 'email', 'role_id', 'telegram_nickname'], 'required'],
            [['role_id'], 'integer'],
            [['username', 'email', 'telegram_nickname'], 'string', 'max' => 255],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'role_id' => 'Role ID',
            'telegram_nickname' => 'Telegram Nickname',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Implement token-based authentication if needed
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;  // Implement if needed
    }

    public function validateAuthKey($authKey)
    {
        return false;  // Implement if needed
    }
}
