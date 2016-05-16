<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
 
class User extends Eloquent implements UserInterface, RemindableInterface
{
     
    use UserTrait, RemindableTrait;
     
    public $timestamps = false;
 
    // ชื่อตาราง tbl_user ในฐานข้อมูล
    protected $table = 'tbl_user';


     
}


