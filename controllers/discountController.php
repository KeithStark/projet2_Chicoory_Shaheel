<?php

class DiscountController
{
    private $validDiscountCodes = [
        "CODE123", "DISC20", "SAVE20", "OFFER20"
    ];

    public function applyDiscount($code, $total)
    {
        if (in_array($code, $this->validDiscountCodes)) {
            return $total * 0.8;
        }
        return $total;
    }
}
