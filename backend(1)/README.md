
## Prepare to build code to docker image

firt run composer install:

```bash
  composer install --ignore-platform-reqs --no-scripts
```

then build the app using docker:

```bash
  docker build -t be-candidate-01:latest .
```

## Run the app in specified port
run the container:
```bash
docker run -d -p 15101:8000 --name be-candidate-01 be-candidate-01:latest
```
now you can access the app on host:15101

## Data structure
Table: delivery_order_items
- id: bigint(20) unsigned (Primary Key)
- do_id: varchar(255) (Foreign Key to delivery_orders.do_id)
- item_code: varchar(255) (Foreign Key to items.item_code)
- item_qty: int(11)
- created_at: timestamp
- updated_at: timestamp

Table: delivery_orders
- do_id: varchar(255) (Primary Key)
- officer_id: varchar(255)
- created_at: timestamp
- updated_at: timestamp
- 
Table: goods_receipt_items
- id: bigint(20) unsigned (Primary Key)
- gr_id: varchar(255) (Foreign Key to goods_receipts.gr_id)
- item_code: varchar(255) (Foreign Key to items.item_code)
- accepted: int(11)
- rejected: int(11)
- rejected_reason: varchar(255)
- created_at: timestamp
- updated_at: timestamp

Table: goods_receipts
- gr_id: varchar(255) (Primary Key)
- partner_gr_num: varchar(255)
- do_id: varchar(255) (Foreign Key to delivery_orders.do_id)
- officer_id: varchar(255)
- created_at: timestamp
- updated_at: timestamp
- 
Table: items
- item_code: varchar(255) (Primary Key)
- item_name: varchar(255)
- stock_quantity: int(11)
- unit_price: int(11)
- created_at: timestamp
- updated_at: timestamp

