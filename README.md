# Purchases API
> This API provides endpoints for managing products, purchases, and items.
- Authentication: No authentication is required for this API.
- Versioning: No versioning is currently implemented.

# Endpoints:
## Products
- `GET /api/products`: Retrieves a list of all products.
- `POST /api/products`: Creates a new product.
#### Request body
```json
{
  "name": "Redragon Keyboard",
  "price": 60000,
  "qty": 4
}
```
- `GET /api/products/{id}`: Retrieves a specific product by its ID.
- `PUT /api/products/{id}`: Updates an existing product.
#### Request body
```json
{
  "name": "Redragon Keyboard Elite",
  "price": 20000,
  "qty": 10
}
```
- `DELETE /api/products/{id}`: Deletes a specific product by its ID.
----

## Purchases
- `GET /api/purchases`: Retrieves a list of all purchases.
- `POST /api/purchases`: Creates a new purchase.
#### Request body
```json
{
    "customer_name":"Mohammed Wisam"
}
```
- `GET /api/purchases/{id}`: Retrieves a specific purchase by its ID.
- `PUT /api/purchases/{id}`: Updates an existing purchase.
#### Request body
```json
{
    "customer_name": "Mohammed Wisam"
}
```
- `DELETE /purchases/purchases/{id}`: Deletes a specific purchase by its ID.
---

## Items
- `POST /api/items`: Creates a new item.
#### Request body
```json
{
    "qty": 2,
    "product_id": 11,
    "purchase_id": 13
}
```
- `GET /api/items/{id}`: Retrieves a specific item by its ID.
- `PUT /api/items/{id}`: Updates an existing item.
#### Request body
```json
{
    "qty": 1
}
```
- `DELETE /api/items/{id}`: Deletes a specific item by its ID.
---
