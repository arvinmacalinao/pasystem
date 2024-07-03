<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table        = 'notifications';
    protected $fillable     = [ 'u_id', 'employee_id', 'title', 'message', 'data', 'url', 'read_at', 'expires_at', 'created_at', 'updated_at', 'deleted_at' ];
    protected $timestamp    = [ 'read_at', 'created_at', 'deleted_at' ];

    public function markAsRead()
    {
        $this->read_at = now();
        $this->save();
    }
}
