<?php


namespace App\Lib\Traits;


trait TableNameAccessor
{
    private static $__tableName;

    public static function tableName()
    {
        return singleVar(static::$__tableName, function (){
            static::$__tableName = (new static())->getTable();
        });
    }
}
