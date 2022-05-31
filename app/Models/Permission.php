<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Shanmuga\LaravelEntrust\Models\EntrustPermission;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends EntrustPermission implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
}
