<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CFMCompany
 *
 * @property string                       $id
 * @property string                       $ic_no
 * @property string                       $fmcompany_id
 * @property string                       $name
 * @property string                       $position_id
 * @property string                       $phone
 * @property string                       $mobile
 * @property string                       $email
 * @property string                       $avatar
 * @property \Carbon\Carbon               $created_at
 * @property \Carbon\Carbon               $updated_at
 * @property string                       $deleted_at
 * @property-read \App\Models\ASystemItem $position
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereIcNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereFmcompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany wherePositionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CFMCompany whereDeletedAt($value)
 * @mixin \Eloquent
 */
class PBTStaff extends Model
{
    public $incrementing = false;

    public static $rules = array(
        'staff_name' => 'required',
        'role'       => 'required',
        'email'      => 'required|email'
    );

    public static $attr = array(
        'staff_name' => 'Nama Staff',
        'role'       => 'Peranan',
        'email'      => 'E-mel'
    );

    // create custom validation messages ------------------//
    protected $table = 'pbt_staff';

    public function avatar()
    {
        return $this->hasOne('App\Models\SYSAsset', 'for_id', 'id')->where('for', 'Staff Avatar');
    }

    public function position()
    {
        return $this->hasOne('App\Models\SysItem', 'id', 'position_id');
    }

    public function login()
    {
        return $this->hasOne('App\Models\USRLogin', 'user_id', 'id');
    }
}
