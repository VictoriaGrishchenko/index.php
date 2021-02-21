<?php
require_once '../vendor/autoload.php';

abstract class Model
{

    public static function find($id)
    {
        $sql = 'SELECT * FROM . strtolower (static::class) . WHERE id = :id';
        if (!is_int($id)){
            throw new Exception( 'Invalid integer!');
        }
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM . strtolower (static::class) . WHERE id = :id';
    }
    public function update (DateTime $update)
    {
        $this -> update = $update;
        $sql = 'UPDATE user SET name = :name, email = :email WHERE id = :id';
    }

    public function create (DateTime $createdAt)
    {
        $this -> setCreate =$createdAt;
       $sql = 'INSERT INTO user (id, name, email) VALUES (:id, :name, :email)';
    }
}

final class User extends Model
{

    protected $id;
    public $name;
    public $email;

    public function save ()
    {
        if ($this->create(DateTime::createFromFormat())=== true){

        } else ($this->update(DateTime::createFromFormat()) == true);

    }
}



$user = User::find(1);
var_dump($user); // SELECT * FROM user WHERE id = :id

$user-> name = 'John';
$result = $user->save();
var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id

$result = $user->delete();
var_dump($result); // DELETE user WHERE id = :id

$user = new User;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)
