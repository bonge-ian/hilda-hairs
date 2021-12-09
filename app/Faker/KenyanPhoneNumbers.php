<?php

namespace App\Faker;

use Faker\Provider\Base;

class KenyanPhoneNumbers extends Base
{
    protected static $formats = array(
        '+254 7## ### ###',
        '+2547########',
        '07## ### ###',
        '07########',
    );

    public function kePhoneNumbers()
    {
        return static::numerify(static::randomElement(static::$formats));
    }
}
