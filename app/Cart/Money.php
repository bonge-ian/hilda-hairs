<?php

namespace App\Cart;

use Money\{Currency, Money as BaseMoney};
use \NumberFormatter;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;

class Money
{
    protected $money;

    public function __construct(mixed $value)
    {
        $this->money = new BaseMoney($value, new Currency('KES'));
    }

    public function amount()
    {
        return $this->money->getAmount();
    }

    public function formatted()
    {
        $formatter = new IntlMoneyFormatter(
            new \NumberFormatter('en_KE', NumberFormatter::CURRENCY),
            new ISOCurrencies
        );
        return $formatter->format($this->money);
    }

}
