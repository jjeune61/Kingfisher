<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Shanmuga\LaravelEntrust\Models\EntrustRole;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends EntrustRole implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
}
