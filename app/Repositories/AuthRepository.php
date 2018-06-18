<?php
/**
 * Created by PhpStorm.
 * User: alfre
 * Date: 30/03/18
 * Time: 01:01 PM
 */

namespace App\Repositories;

class AuthRepository extends Repository
{
    /**
     * @var \Illuminate\Database\DatabaseManager $db
     */
    private $db;

    public function __construct()
    {
        $this->db = $this->getDB();
    }

    public function authenticate($data)
    {

    }

    /**
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function findByEmail($email)
    {
        return $this->db->table("users")->where("email", $email)->first();
    }
}