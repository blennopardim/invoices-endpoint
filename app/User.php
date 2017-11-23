<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Invoices\Core\InvoiceCoreUserTraid;

class User extends Authenticatable
{
    use Notifiable;
    use InvoiceCoreUserTraid;
    protected $appends = ['invoices_count'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'birthdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getInvoicesCountAttribute()
    {
        # Future enable cache
        return $this->invoices()->count();
    }

}
