<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Promo;

class Constants
{
    const DISCOUNT_FLAT = 'flat';
    const DISCOUNT_PERCENTAGE = 'percentage';

    const LIMIT_QUOTA = 'quota';
    const LIMIT_BUDGET = 'budget';

    const DEDUCTION_TOTAL_PRICE = 'total_price';
    const DEDUCTION_PRODUCT_PRICE = 'product_price';
    const DEDUCTION_SHIPPING_PRICE = 'shipping_price';

    const PROMO_TYPE_CARD = 'card_promos';
    const PROMO_TYPE_EWALLET = 'ewallet_promos';
    const PROMO_TYPE_VA = 'va_promos';

    const PROMO_SUBTYPE_DIRECT_DISCOUNT = 'direct_discount';
    const PROMO_SUBTYPE_CASHBACK = 'cashback';
}
