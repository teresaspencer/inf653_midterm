CREATE TABLE authors (
    id SERIAL PRIMARY KEY,
    author VARCHAR(50) NOT NULL
);

CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    category VARCHAR(20) NOT NULL
);

CREATE TABLE quotes (
    id SERIAL PRIMARY KEY,
    quote TEXT NOT NULL,
    author_id INT REFERENCES authors(id),
    category_id INT REFERENCES categories(id)
);

-- Seed authors
INSERT INTO authors (author) VALUES
    ('Martin Luther King Jr.'), --id 1
    ('Mark Twain'), --id 2
    ('Abraham Lincoln'), --id 3
    ('Winston Churchill'), --id 4
    ('Emily Dickinson'), --id 5
    ('George Carlin'), --id 6
    ('Helen Keller'), --id 7
    ('Theodore Roosevelt'), --id 8
    ('Barack Obama'); --id 9

-- Seed categories
INSERT INTO categories (category) VALUES
    ('Motivation'), --id 1
    ('Inspiration'), --id 2
    ('Poetry'), --id 3
    ('Humor'), --id 4
    ('Justice'), --id 5
    ('Politics'), --id 6
    ('Wisdom'); --id 7

-- Seed quotes
INSERT INTO quotes (quote, author_id, category_id) VALUES 
    -- Mark Twain
    ('It is better to keep you mouth closed and let people think you are a fool than to open it and remove all doubt.', 2, 7),
    ('Anger is an acid that can do more harm to the vessel in which it is stored than to anything on which it is poured.', 2, 7),
    ('Patriotism is supporting your country all the time, and your government when it deserves it.', 2, 4),
    ('Suppose you were an idiot, and suppose you were a member of Congress; but I repeat myself.', 2, 6),
    -- MLK
    ('We must learn to live together as brothers or perish together as fools.', 1, 5),
    ('The ultimate measure of a man is not where he stands in moments of comfort and convenience, but where he stands at times of challenge and controversy.', 1, 5),
    ('Freedom is never voluntarily given by the oppressor; it must be demanded by the oppressed.', 1, 5),
    -- Churchill
    ('You can always count on Americans to do the right thing - after they''ve tried everything else.', 4, 6),
    ('A lie gets halfway around the world before the truth has a chance to get its pants on.', 4, 6),
    -- Emily Dickinson
    ('Unable are the loved to die, for love is immortality.', 5, 3),
    ('Morning without you is a dwindled dawn.', 5, 3),
    ('Truth is so rare that it is delightful to tell it.', 5, 4),
    ('Saying nothing sometimes says the most', 5, 7),
    ('If I can stop one heart from breaking, I shall not live in vain.', 5, 3),
    -- Abraham Lincoln
    ('You have to do your own growing no matter how tall your grandfather was.', 3, 6),
    ('The ballot is stronger than the bullet.', 3, 6),
    -- George Carlin id 6
    ('Don''t sweat the petty things and don''t pet the sweaty things.', 6, 4),
    ('If you can''t beat them, arrange to have them beaten.', 6, 4),
    -- Barack Obama id 9
    ('I mean, I do think at a certain point you''ve made enough money', 9, 6),
    ('What Washington needs is adult supervision', 9, 6),
    -- Hellen Keller id 7
    ('Optimism is the faith that leads to achievment. Nothing can be done without hope and confidence.', 7, 1),
    ('Alone we can do so little; together we can do so much.', 7, 1),
    ('Avoiding danger is no safer in the long run than outright exposure. The fearful are caught as often as the bold.', 7, 7),
    ('No one has a right to consume happiness without producing it.', 7, 7),
    -- Teddy Roosevelt id 8
    ('Belive you can and you''re halfway there.', 8, 2),
    ('Keep your eyes on the stars, and your feet on the ground.', 8, 2),
    ('To educate a man in mind and not in morals is to educate a menace to society', 8, 7);