CREATE VIEW TopCincoMarcas AS
SELECT M.nombre_marca, SUM(V.cantidad) AS total_vendido
FROM Marcas M
JOIN Prendas P ON M.marca_id = P.marca_id
JOIN Ventas V ON P.prenda_id = V.prenda_id
GROUP BY M.marca_id
ORDER BY total_vendido DESC
LIMIT 5;