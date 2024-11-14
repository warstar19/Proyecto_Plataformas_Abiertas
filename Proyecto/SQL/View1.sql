CREATE VIEW MarcasConVentas AS
SELECT DISTINCT M.marca_id, M.nombre_marca
FROM Marcas M
JOIN Prendas P ON M.marca_id = P.marca_id
JOIN Ventas V ON P.prenda_id = V.prenda_id;