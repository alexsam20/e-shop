<?php

namespace app\models\admin;

use RedBeanPHP\R;

class User extends \app\models\User
{
    public array $attributes = [
        'email' => '',
        'password' => '',
        'name' => '',
        'address' => '',
        'role' => '',
    ];

    public array $rules = [
        'required' => ['email', 'password', 'name', 'address', 'role',],
        'email' => ['email',],
        'lengthMin' => [
            ['password', 6],
        ],
        'optional' => ['password'],
    ];

    public array $labels = [
        'email' => 'E-mail',
        'password' => 'Password',
        'name' => 'Name',
        'address' => 'Address',
        'role' => 'Role',
    ];

    public static function isAdmin(): bool
    {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin');
    }

    public function countUses(): int
    {
        return R::count('user');
    }

    public function getUsers($start, $perpage): array
    {
        return R::findAll("user", "LIMIT $start, $perpage");
    }

    public function getUser($id): array
    {
        return R::getRow("SELECT * FROM user WHERE id = ?", [$id]);
    }

    public function checkEmail($user_data): bool
    {
        if ($user_data['email'] === $this->attributes['email']) {
            return true;
        }
        $user = R::findOne('user', 'email = ?', [$this->attributes['email']]);
        if ($user) {
            $this->errors['unique'][] = 'This is e-mail is already in use another user';
            return false;
        }
        return true;
    }

}