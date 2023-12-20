-- 1

SELECT mov_title, mov_year From movie

-- 2

SELECT mov_year FROM movie WHERE mov_title = 'American Beauty'

-- 3

SELECT mov_title FROM movie WHERE mov_year = '1999'

-- 4

SELECT mov_title FROM movie WHERE mov_year < '1998'

-- 5

(SELECT rev_name FROM reviewer) UNION (SELECT mov_title FROM movie)


 (SELECT
    mov_id
    FROM movie)
 UNION
 (SELECT
    rev_name
    FROM reviewer)


SELECT reviewer.rev_name, movie.mov_title 
FROM reviewer, rating, movie
WHERE movie.mov_id= rating.mov_id
AND reviewer.rev_id = rating.rev_id
AND rev_name IS NOT NULL;



-- 6

SELECT reviewer.rev_name, rating.rev_stars 
FROM reviewer, rating   
WHERE rating.rev_stars >= 7
AND rating.rev_id= reviewer.rev_id
AND rev_name IS NOT NULL;

-- 7

SELECT mov_title FROM movie
WHERE mov_id NOT IN(
SELECT mov_id 
FROM rating 
WHERE mov_id IS NOT NULL)

-- 8

SELECT mov_title FROM movie
WHERE mov_id IN(905, 907, 917)

-- 9

SELECT mov_title, mov_year FROM movie
WHERE mov_title = 'Boogie Nights'

-- 10

SELECT act_id FROM actor
WHERE act_fname = 'Woody' AND act_lname = 'Allen'



-- Joins

-- 1
SELECT rev_name 
FROM reviewer 
INNER JOIN rating 
ON reviewer.rev_id = rating.rev_id
WHERE rev_stars IS NULL;

-- result : 2

-- 2

SELECT act_fname, act_lname , role
FROM actor
INNER JOIN movie_cast
ON actor.act_id = movie_cast.act_id
WHERE mov_id = 911;


-- result : 1

-- 3

SELECT mov_title, dir_fname, dir_lname
FROM director
INNER JOIN movie_direction
ON director.dir_id = movie_direction.dir_id
INNER JOIN movie
ON movie.mov_id = movie_direction.mov_id
INNER JOIN movie_cast
ON movie.mov_id = movie_cast.mov_id
WHERE mov_title = 'Eyes Wide Shut' AND role IS NOT NULL

-- result : 1


-- simplified

SELECT mov_title, dir_fname, dir_lname
FROM director
NATURAL JOIN movie_direction
NATURAL JOIN movie
NATURAL JOIN movie_cast
WHERE mov_title = 'Eyes Wide Shut' AND role IS NOT NULL

-- 4

SELECT mov_title, dir_fname, dir_lname
FROM director
NATURAL JOIN movie_direction
NATURAL JOIN movie
NATURAL JOIN movie_cast
WHERE role = 'Sean Maguire'

-- 5

SELECT act_fname, act_lname, mov_year
FROM actor
INNER JOIN movie_cast
ON actor.act_id = movie_cast.act_id
INNER JOIN movie
ON movie.mov_id = movie_cast.mov_id
WHERE mov_year < 1990 OR mov_year > 2000

-- 6

SELECT
    director.dir_fname, 
    director.dir_lname,
    movie.mov_title,
    COUNT(genres.gen_title) AS genre_count
FROM director
INNER JOIN movie_direction
ON director.dir_id = movie_direction.dir_id
INNER JOIN movie
ON movie.mov_id = movie_direction.mov_id
INNER JOIN movie_genres
ON movie.mov_id = movie_genres.mov_id
INNER JOIN genres
ON movie_genres.gen_id = genres.gen_id
GROUP BY director.dir_fname, director.dir_lname, movie.mov_title
ORDER BY dir_fname ASC, dir_lname ASC;
