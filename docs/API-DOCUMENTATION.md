# API Documentation

## Calculator API

### Calculate Price
**Endpoint:** `wp-ajax.php?action=palmo_calculate`
**Method:** POST
**Auth:** Public (nonce protected)

**Parameters:**
- from_postal (string, 5 digits)
- to_postal (string, 5 digits)
- weight (float, kg)
- urgency (string, normal|express)

**Response:**
```json
{
  "success": true,
  "data": {
    "distance": 450,
    "price": "125.50",
    "currency": "€"
  }
}
```
