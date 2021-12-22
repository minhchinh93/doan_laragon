SELECT
    bill_detaills.quantity,
    bills.date_order,
    customers.name as 'khách hàng',
    products.name as 'tên sản phẩm',
    bills.total
FROM
    bills
INNER JOIN bill_detaills ON bill_detaills.id_bill = bills.id
INNER JOIN products ON bill_detaills.id_product = products.id

INNER JOIN customers ON bills.id_customer = customers.id


SELECT 
SUM(bill_detaills.quantity) as 'so luong',
 bills.date_order, customers.name as 'khách hàng',
 bills.total FROM bills 
 INNER JOIN
 bill_detaills 
 
 ON bill_detaills.id_bill = bills.id 
 INNER JOIN
 customers 
 ON bills.id_customer = customers.id GROUP BY bills.id;
 
 **Step 1**: composer install

**Step 2**: change config database (copy .env.example -> .env)
