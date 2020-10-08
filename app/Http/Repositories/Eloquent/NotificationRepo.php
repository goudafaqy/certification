<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\NotificationEloquent;
use App\Models\NotificationSetting;

class NotificationRepo extends Repository implements NotificationEloquent{
    
    public function __construct()
    {
        parent::__construct(new NotificationSetting());
    }
}