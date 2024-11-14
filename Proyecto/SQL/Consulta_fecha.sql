SELECT P.nombre_prenda, SUM(V.cantidad) AS total_vendido
FROM Prendas P
JOIN Ventas V ON P.prenda_id = V.prenda_id
WHERE V.fecha_venta = 'YYYY-MM-DD'
GROUP BY P.prenda_id;