CREATE VIEW PrendasVendidasStockRestante AS
SELECT P.prenda_id, P.nombre_prenda, SUM(V.cantidad) AS total_vendido, P.stock
FROM Prendas P
JOIN Ventas V ON P.prenda_id = V.prenda_id
GROUP BY P.prenda_id;