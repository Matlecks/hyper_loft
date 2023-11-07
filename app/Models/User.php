<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getActiveAndInactiveColumns()
    {
        $table_name = 'users';

        $tableSetting = TableSetting::where('table_name', $table_name)->first();

        $columns = json_decode($tableSetting->settings ?? $tableSetting->default)->data;

        $all_default_columns = json_decode($tableSetting->default)->data;

        usort($columns, function ($a, $b) {
            return $a->sort - $b->sort;
        });

        $all_columns = array_column($all_default_columns, 'column_name');
        $active_columns = array_column($columns, 'column_name');
        $inactive_columns = array_diff($all_columns, $active_columns);

        return [
            'active_columns' => $active_columns,
            'inactive_columns' => $inactive_columns,
            'columns' => $columns,
        ];
    }
}
