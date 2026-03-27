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
    ('Taylor Swift'),
    ('Noah Kahan'),
    ('Hozier'),
    ('Andy Weir'),
    ('Holly Black'),
    ('Martin Luther King Jr.'),
    ('Mark Twain'),
    ('Abraham Lincoln'),
    ('Winston Churchill'),
    ('Emily Dickinson');

-- Seed categories
INSERT INTO categories (category) VALUES
    ('Fiction'),
    ('Song Lyrics'),
    ('Poetry'),
    ('Politics'),
    ('Justice'),
    ('Humor'),
    ('Wisdom');

-- Seed quotes
INSERT INTO quotes (quote, author_id, category_id) VALUES 
    -- Taylor
    ('We gather stones, never knowing what they''ll mean. Some to throw, some to make a diamond ring.', 1, 2),
    ('I want auroras and sad prose. I want to watch wisteria grow right over my bare feet.', 1, 2),
    ('The tomb won''t close. Stained glass windows in my mind. I regret you all the time.', 1, 2),
    ('And I''ll forget you, but I''ll never forgive The smallest man who ever lived.', 1, 2),
    -- Hozier
    ('No grave can hold my body down. I''ll crawl home to her.', 3, 2),
    ('Skinning the children for a war drum. Putting food on the table selling bombs and guns. It''s quicker and easier to eat your young.', 3, 2),
    ('And all things end. All that we intend is scrawled in sand. Or slips right through our hands.', 3, 2),
    ('How could I fall When I am lifted by every word you say to me?', 3, 2),
    -- Noah
    ('Did you find what you were lookin'' for? Some escape from your skin. You know that place you were dreamin'' of Where all light comes in.', 2, 2),
    ('Don''t let this darkness fool you. All lights turned off can be turned on.', 2, 2),
    -- Mark Twain
    ('It is better to keep you mouth closed and let people think you are a fool than to open it and remove all doubt.', 7, 7),
    ('Anger is an acid that can do more harm to the vessel in which it is stored than to anything on which it is poured.', 7, 7),
    ('Patriotism is supporting your country all the time, and your government when it deserves it.', 7, 7),
    ('Suppose you were an idiot, and suppose you were a member of Congress; but I repeat myself.', 7, 7),
    -- MLK
    ('We must learn to live together as brothers or perish together as fools.', 6, 5),
    ('The ultimate measure of a man is not where he stands in moments of comfort and convenience, but where he stands at times of challenge and controversy.', 6, 5),
    ('Freedom is never voluntarily given by the oppressor; it must be demanded by the oppressed.', 6, 5),
    -- Churchill
    ('You can always count on Americans to do the right thing - after they''ve tried everything else.', 9, 4),
    ('A lie gets halfway around the world before the truth has a chance to get its pants on.', 9, 4),
    -- Emily Dickinson
    ('Unable are the loved to die, for love is immortality.', 10, 3),
    ('Morning without you is a dwindled dawn.', 10, 3),
    -- Abraham Lincoln
    ('You have to do your own growing no matter how tall your grandfather was.', 8, 4),
    ('The ballot is stronger than the bullet.', 8, 4),
    -- Holly Black
    ('Most of all, I hate you because I think of you. Often. It''s disgusting, and I can''t stop.', 5, 1),
    ('Power is much easier to acquire than it is to hold on to.', 5, 1),
    ('By you, I am forever undone.', 5, 1),
    ('I am nothing, if not dramatic.', 5, 1),
    ('Come be angry at a nearer distance.', 5, 1),
    -- Andy Weir
    ('As with most of life''s problems, this one can be solved by a box of pure radiation.', 4, 1),
    ('Human beings have a remarkable ability to accept the abnormal and make it normal.', 4, 1),
    ('Things didn''t go exactly as planned, but I''m not dead, so it''s a win.', 4, 1);