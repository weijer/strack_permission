<?php

namespace Strack\Casbin\Models;

use think\Model;

class CasbinRule extends Model
{
    public function __construct($data = [])
    {
        $this->connection = C('casbin.database.connection') ?: '';

        $this->table = C('casbin.database.casbin_rules_table');

        $this->name = C('casbin.database.casbin_rules_name');

        parent::__construct($data);
    }
}
