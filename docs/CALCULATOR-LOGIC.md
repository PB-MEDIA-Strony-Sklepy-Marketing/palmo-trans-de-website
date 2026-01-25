# Calculator Business Logic

## Price Calculation Formula

```
base_price = distance * 0.50 EUR/km
weight_surcharge = (weight - 100kg) * 0.10 EUR/kg
urgency_multiplier = 1.5 (express) or 1.0 (normal)
total = (base_price + weight_surcharge) * urgency_multiplier
minimum = max(total, 25.00 EUR)
```

## Validation Rules
- Postal codes: 5 digits, range 01000-99999
- Weight: 1-10000 kg
- Distance: minimum 1 km
- Urgency: normal or express

## Business Rules
- Minimum charge: 25 EUR
- Base rate: 0.50 EUR/km
- Weight surcharge over 100kg: 0.10 EUR/kg
- Express surcharge: +50%
