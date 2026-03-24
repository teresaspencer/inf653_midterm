-- Create database
--CREATE DATABASE quotesdb;
--\c quotesdb

--CREATE TABLE authors (
--    id SERIAL PRIMARY KEY,
--    author VARCHAR(50) NOT NULL
--);

--CREATE TABLE categories (
--    id SERIAL PRIMARY KEY,
--    category VARCHAR(20) NOT NULL
--);

--CREATE TABLE quotes (
--    id SERIAL PRIMARY KEY,
--    quote TEXT NOT NULL,
--    author_id INT REFERENCES authors(id),
--    category_id INT REFERENCES categories(id)
--);

INSERT INTO quotes (quote, author_id, category_id)
VALUES 
    -- Taylor
    ("We gather stones, never knowing what they'll mean. Some to throw, some to make a diamond ring.", ,),
    ("I want auroras and sad prose. I want to watch wisteria grow right over my bare feet.", ,),
    ("The tomb won't close. Stained glass windows in my mind. I regret you all the time.", ,),
    ("And I'll forget you, but I'll never forgive The smallest man who ever lived.", ,),
    -- Hozier
    ("No grave can hold my body down. I'll crawl home to her.", ,),
    ("Skinning the children for a war drum. Putting food on the table selling bombs and guns. It's quicker and easier to eat your young.", ,),
    ("And all things end. All that we intend is scrawled in sand. Or slips right through our hands.", ,),
    ("How could I fall When I am lifted by every word you say to me?", ,),
    -- Noah
    ("Did you find what you were lookin' for? Some escape from your skin. You know that place you were dreamin' of Where all light comes in.", ,),
    ("Don't let this darkness fool you. All lights turned off can be turned on.", ,),
    ("", ,),
    ("", ,),
    -- Mark Twain
    ("It is better to keep you mouth closed and let people think you are a fool than to open it and remove all doubt.", ,),
    ("Anger is an acid that can do more harm to the vessel in which it is stored than to anything on which it is poured.", ,),
    ("Patriotism is supporting your country all the time, and your government when it deserves it.", ,),
    ("Suppose you were an idiot, and suppose you were a member of Congress; but I repeat myself.", ,),
    -- MLK
    ("We must learn to live together as brothers or perish together as fools.", ,),
    ("The ultimate measure of a man is not where he stands in moments of comfort and convenience, but where he stands at times of challenge and controversy.", ,),
    ("Freedom is never voluntarily given by the oppressor; it must be demanded by the oppressed.", ,),
    ("", ,),
    -- Churchill
    ("You can always count on Americans to do the right thing - after they've tried everything else.", ,),
    ("A lie gets halfway around the world before the truth has a chance to get its pants on.", ,),
    ("", ,),
    ("", ,),
    ("", ,),
    
