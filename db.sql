SELECT *
FROM City;
SELECT *
FROM City
LIMIT 5;
SELECT *
FROM City
LIMIT 5, 10;


SELECT
  Name,
  Population
FROM City
LIMIT 5;


SELECT *
FROM City
WHERE CountryCode = 'NLD';
SELECT *
FROM City
WHERE CountryCode = 'NLD'
ORDER BY Population ASC;
SELECT *
FROM City
WHERE CountryCode = 'NLD'
ORDER BY Population DESC;
SELECT *
FROM City
WHERE CountryCode = 'NLD'
ORDER BY Population DESC, Name ASC;


SELECT *
FROM City
WHERE CountryCode = 'NLD' AND Name = 'Amsterdam';
SELECT *
FROM City
WHERE Population > 1000000;
SELECT *
FROM City
WHERE Name LIKE 'min%';


UPDATE City
SET Population = 95052
WHERE ID = 32;