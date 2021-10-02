curl -X GET "localhost:8080/user"

curl -X POST "localhost:8080/user" -H 'Content-Type: application/json' -d'
{
  "admin": 5305,
  "email": "hendersonmichael@example.net",
  "first_name": "stay",
  "intro": "Technology argue you price inside within expect.",
  "last_login": "2021-09-25 13:19:27",
  "last_name": "popular",
  "middle_name": "interest",
  "mobile": "before",
  "password_hash": "a",
  "profile": "Watch teacher by small. Laugh woman type behavior discussion. Record boy modern ready candidate.",
  "registered_at": "2021-09-22 05:26:42",
  "vendor": 9512
}
'

curl -X POST "localhost:8080/user/5909" -H 'Content-Type: application/json' -d'
{
  "admin": 5305,
  "email": "hendersonmichael@example.net",
  "first_name": "stay",
  "id": 5909,
  "intro": "Technology argue you price inside within expect.",
  "last_login": "2021-09-25 13:19:27",
  "last_name": "popular",
  "middle_name": "interest",
  "mobile": "before",
  "password_hash": "a",
  "profile": "Watch teacher by small. Laugh woman type behavior discussion. Record boy modern ready candidate.",
  "registered_at": "2021-09-22 05:26:42",
  "vendor": 9512
}
'

curl -X GET "localhost:8080/user/5909"

curl -X DELETE "localhost:8080/user/5909"

# --

curl -X GET "localhost:8080/product"

curl -X POST "localhost:8080/product" -H 'Content-Type: application/json' -d'
{
  "content": "Computer instead management impact Republican me. Realize field population character individual commercial smile act. Good agree health many.",
  "created_at": "2021-10-10 12:04:37",
  "discount": 713.0,
  "ends_at": "2021-10-03 09:42:43",
  "meta_title": "site",
  "price": 596.0,
  "published_at": "2021-09-25 09:55:07",
  "quantity": 4760,
  "shop": 2145,
  "sku": "guy",
  "slug": "your",
  "starts_at": "2021-09-28 01:27:35",
  "summary": "Lose decision protect.",
  "title": "book",
  "type": 9257,
  "updated_at": "2021-09-24 17:05:04",
  "user_id": 6932
}
'

curl -X POST "localhost:8080/product/9346" -H 'Content-Type: application/json' -d'
{
  "content": "Computer instead management impact Republican me. Realize field population character individual commercial smile act. Good agree health many.",
  "created_at": "2021-10-10 12:04:37",
  "discount": 713.0,
  "ends_at": "2021-10-03 09:42:43",
  "id": 9346,
  "meta_title": "site",
  "price": 596.0,
  "published_at": "2021-09-25 09:55:07",
  "quantity": 4760,
  "shop": 2145,
  "sku": "guy",
  "slug": "your",
  "starts_at": "2021-09-28 01:27:35",
  "summary": "Lose decision protect.",
  "title": "book",
  "type": 9257,
  "updated_at": "2021-09-24 17:05:04",
  "user_id": 6932
}
'

curl -X GET "localhost:8080/product/9346"

curl -X DELETE "localhost:8080/product/9346"

# --

curl -X GET "localhost:8080/product-meta"

curl -X POST "localhost:8080/product-meta" -H 'Content-Type: application/json' -d'
{
  "content": "Leg explain threat appear truth. Positive high partner century.",
  "key": "attack",
  "product_id": 1022
}
'

curl -X POST "localhost:8080/product-meta/866" -H 'Content-Type: application/json' -d'
{
  "content": "Leg explain threat appear truth. Positive high partner century.",
  "id": 866,
  "key": "attack",
  "product_id": 1022
}
'

curl -X GET "localhost:8080/product-meta/866"

curl -X DELETE "localhost:8080/product-meta/866"

# --

curl -X GET "localhost:8080/product-review"

curl -X POST "localhost:8080/product-review" -H 'Content-Type: application/json' -d'
{
  "content": "Late agent hot church within. Woman film everyone rest page wrong rather community.",
  "created_at": "2021-10-10 17:46:15",
  "parent_id": 7339,
  "product_id": 758,
  "published": 5592,
  "published_at": "2021-09-27 03:11:27",
  "rating": 2464,
  "title": "party"
}
'

curl -X POST "localhost:8080/product-review/1753" -H 'Content-Type: application/json' -d'
{
  "content": "Late agent hot church within. Woman film everyone rest page wrong rather community.",
  "created_at": "2021-10-10 17:46:15",
  "id": 1753,
  "parent_id": 7339,
  "product_id": 758,
  "published": 5592,
  "published_at": "2021-09-27 03:11:27",
  "rating": 2464,
  "title": "party"
}
'

curl -X GET "localhost:8080/product-review/1753"

curl -X DELETE "localhost:8080/product-review/1753"

# --

curl -X GET "localhost:8080/category"

curl -X POST "localhost:8080/category" -H 'Content-Type: application/json' -d'
{
  "content": "Near community create catch. Young mother beautiful just theory girl boy. Now live word my control letter only building.",
  "meta_title": "instead",
  "parent_id": 6486,
  "slug": "happy",
  "title": "wall"
}
'

curl -X POST "localhost:8080/category/8376" -H 'Content-Type: application/json' -d'
{
  "content": "Near community create catch. Young mother beautiful just theory girl boy. Now live word my control letter only building.",
  "id": 8376,
  "meta_title": "instead",
  "parent_id": 6486,
  "slug": "happy",
  "title": "wall"
}
'

curl -X GET "localhost:8080/category/8376"

curl -X DELETE "localhost:8080/category/8376"

# --

curl -X GET "localhost:8080/product-category"

curl -X POST "localhost:8080/product-category" -H 'Content-Type: application/json' -d'
{
  "category_id": 1243,
  "product_id": 6488
}
'

curl -X POST "localhost:8080/product-category/8265" -H 'Content-Type: application/json' -d'
{
  "category_id": 1243,
  "id": 8265,
  "product_id": 6488
}
'

curl -X GET "localhost:8080/product-category/8265"

curl -X DELETE "localhost:8080/product-category/8265"

# --

curl -X GET "localhost:8080/cart"

curl -X POST "localhost:8080/cart" -H 'Content-Type: application/json' -d'
{
  "city": "piece",
  "content": "Pay happen often staff everything wrong. Paper big only home close laugh. Stock keep until with those direction.",
  "country": "seek",
  "created_at": "2021-10-08 08:36:44",
  "email": "dominic30@example.net",
  "first_name": "key",
  "last_name": "painting",
  "line1": "class",
  "line2": "sell",
  "middle_name": "benefit",
  "mobile": "approach",
  "province": "simple",
  "session_id": "trade",
  "status": 5289,
  "token": "nice",
  "updated_at": "2021-10-11 04:01:59",
  "user_id": 741
}
'

curl -X POST "localhost:8080/cart/8327" -H 'Content-Type: application/json' -d'
{
  "city": "piece",
  "content": "Pay happen often staff everything wrong. Paper big only home close laugh. Stock keep until with those direction.",
  "country": "seek",
  "created_at": "2021-10-08 08:36:44",
  "email": "dominic30@example.net",
  "first_name": "key",
  "id": 8327,
  "last_name": "painting",
  "line1": "class",
  "line2": "sell",
  "middle_name": "benefit",
  "mobile": "approach",
  "province": "simple",
  "session_id": "trade",
  "status": 5289,
  "token": "nice",
  "updated_at": "2021-10-11 04:01:59",
  "user_id": 741
}
'

curl -X GET "localhost:8080/cart/8327"

curl -X DELETE "localhost:8080/cart/8327"

# --

curl -X GET "localhost:8080/cart-item"

curl -X POST "localhost:8080/cart-item" -H 'Content-Type: application/json' -d'
{
  "active": 6355,
  "cart_id": 365,
  "content": "Daughter draw eight popular mission player hair. Year trade treat data lot economic house.",
  "created_at": "2021-10-06 23:09:37",
  "discount": 304.34014436049,
  "price": 314.235,
  "product_id": 6770,
  "quantity": 2017,
  "sku": "other",
  "updated_at": "2021-09-26 09:15:12"
}
'

curl -X POST "localhost:8080/cart-item/8499" -H 'Content-Type: application/json' -d'
{
  "active": 6355,
  "cart_id": 365,
  "content": "Daughter draw eight popular mission player hair. Year trade treat data lot economic house.",
  "created_at": "2021-10-06 23:09:37",
  "discount": 304.34014436049,
  "id": 8499,
  "price": 314.235,
  "product_id": 6770,
  "quantity": 2017,
  "sku": "other",
  "updated_at": "2021-09-26 09:15:12"
}
'

curl -X GET "localhost:8080/cart-item/8499"

curl -X DELETE "localhost:8080/cart-item/8499"

# --

curl -X GET "localhost:8080/order"

curl -X POST "localhost:8080/order" -H 'Content-Type: application/json' -d'
{
  "city": "into",
  "content": "They record station mention adult age. Seven even cause sign high bed another want.",
  "country": "require",
  "created_at": "2021-09-24 10:44:21",
  "discount": 276.8,
  "email": "rowens@example.org",
  "first_name": "edge",
  "grand_total": 651.0,
  "item_discount": 478.35372255,
  "last_name": "garden",
  "line1": "piece",
  "line2": "people",
  "middle_name": "try",
  "mobile": "station",
  "promo": "until",
  "province": "phone",
  "session_id": "your",
  "shipping": 24.8,
  "status": 888,
  "sub_total": 659.914,
  "tax": 951.0,
  "token": "could",
  "total": 92.5,
  "updated_at": "2021-09-24 21:23:23",
  "user_id": 2695
}
'

curl -X POST "localhost:8080/order/7285" -H 'Content-Type: application/json' -d'
{
  "city": "into",
  "content": "They record station mention adult age. Seven even cause sign high bed another want.",
  "country": "require",
  "created_at": "2021-09-24 10:44:21",
  "discount": 276.8,
  "email": "rowens@example.org",
  "first_name": "edge",
  "grand_total": 651.0,
  "id": 7285,
  "item_discount": 478.35372255,
  "last_name": "garden",
  "line1": "piece",
  "line2": "people",
  "middle_name": "try",
  "mobile": "station",
  "promo": "until",
  "province": "phone",
  "session_id": "your",
  "shipping": 24.8,
  "status": 888,
  "sub_total": 659.914,
  "tax": 951.0,
  "token": "could",
  "total": 92.5,
  "updated_at": "2021-09-24 21:23:23",
  "user_id": 2695
}
'

curl -X GET "localhost:8080/order/7285"

curl -X DELETE "localhost:8080/order/7285"

# --

curl -X GET "localhost:8080/order-item"

curl -X POST "localhost:8080/order-item" -H 'Content-Type: application/json' -d'
{
  "content": "Rather material do its couple floor energy prove. Put whom garden main tell leg. Modern best full party worker price action.",
  "created_at": "2021-09-22 02:45:40",
  "discount": 721.0,
  "order_id": 5061,
  "price": 760.0,
  "product_id": 9831,
  "quantity": 9956,
  "sku": "after",
  "updated_at": "2021-09-29 17:33:11"
}
'

curl -X POST "localhost:8080/order-item/9149" -H 'Content-Type: application/json' -d'
{
  "content": "Rather material do its couple floor energy prove. Put whom garden main tell leg. Modern best full party worker price action.",
  "created_at": "2021-09-22 02:45:40",
  "discount": 721.0,
  "id": 9149,
  "order_id": 5061,
  "price": 760.0,
  "product_id": 9831,
  "quantity": 9956,
  "sku": "after",
  "updated_at": "2021-09-29 17:33:11"
}
'

curl -X GET "localhost:8080/order-item/9149"

curl -X DELETE "localhost:8080/order-item/9149"

# --

curl -X GET "localhost:8080/transaction"

curl -X POST "localhost:8080/transaction" -H 'Content-Type: application/json' -d'
{
  "code": "loss",
  "content": "Receive week grow prevent record station. Moment future article.",
  "created_at": "2021-10-06 07:26:55",
  "mode": 6810,
  "order_id": 940,
  "status": 7483,
  "type": 5057,
  "updated_at": "2021-09-18 21:00:03",
  "user_id": 8282
}
'

curl -X POST "localhost:8080/transaction/4384" -H 'Content-Type: application/json' -d'
{
  "code": "loss",
  "content": "Receive week grow prevent record station. Moment future article.",
  "created_at": "2021-10-06 07:26:55",
  "id": 4384,
  "mode": 6810,
  "order_id": 940,
  "status": 7483,
  "type": 5057,
  "updated_at": "2021-09-18 21:00:03",
  "user_id": 8282
}
'

curl -X GET "localhost:8080/transaction/4384"

curl -X DELETE "localhost:8080/transaction/4384"

# --

