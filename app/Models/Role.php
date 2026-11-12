<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public static $columns = [
        ['name' => 'name', 'data' => 'name'],
        ['name' => 'status', 'data' => 'status'],
        ['name' => 'action', 'data' => 'action', 'orderable' => false, 'searchable' => false],
    ];
}