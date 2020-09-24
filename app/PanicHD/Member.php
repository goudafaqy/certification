<?php

namespace App\PanicHD;

use Illuminate\Support\Facades\App;
use PanicHD\PanicHD\Models\Member as PanicHDMember;

class Member extends PanicHDMember
{

    public function scopeAgentsLists($query)
    {
        $nameField = "name_ar";//. App::getLocale();
        if (version_compare(app()->version(), '5.2.0', '>=')) {
            return $query->where('panichd_agent', '1')->pluck($nameField, 'id')->toArray();
        } else { // if Laravel 5.1
            return $query->where('panichd_agent', '1')->lists($nameField, 'id')->toArray();
        }
    }
}
