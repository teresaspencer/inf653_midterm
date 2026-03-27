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
    ('Writings'),
    ('Poetry'),
    ('Politics'),
    ('Justice'),
    ('Humor'),
    ('Wisdom');

-- Seed quotes
INSERT INTO quotes (quote, author_id, category_id) VALUES 
    -- Taylor
    ('We gather stones, never knowing what they''ll mean.', 1, 2),
    ...