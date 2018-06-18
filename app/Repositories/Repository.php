<?php
/**
 * Created by PhpStorm.
 * User: alfre
 * Date: 30/03/18
 * Time: 01:07 PM
 */

namespace App\Repositories;

class Repository
{
    /**
     * @return \Illuminate\Database\DatabaseManager
     */
    protected function getDB()
    {
        return app("db");
    }

    /**
     * @param string $str
     * @return string
     */
    protected function escapeString($str)
    {
        return addslashes(str_replace('"', '', $str));
    }
}