
объединение таблицы с самой собой
SELECT first.id, first.comment, first.product_id, first.data, first.parent_id, second.id, second.comment, second.data 
               FROM comment first, comment second 
               WHERE first.id = second.parent_id