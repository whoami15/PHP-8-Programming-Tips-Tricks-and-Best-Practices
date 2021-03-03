<?php
// /repo/ch05/php8_variance_contravariant.php
class User
{
    public $id    = 0;
    public $first = '';
    public $last  = '';
}
class Guest extends User {}
interface UserInterface
{
    public function __construct(User $user);
}
class Signup implements UserInterface
{
    public $user = NULL;
    public function __construct(Guest $user)
    {
        $this->user = $user;
    }
}
