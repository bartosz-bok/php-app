-- Wstawianie danych do tabeli categories
INSERT INTO categories (category_name, category_color) VALUES
                                                           ('Europa', 'Niebieski'),
                                                           ('Ameryka Polnocna', 'Zielony'),
                                                           ('Ameryka Poludniowa', 'Czerwony'),
                                                           ('Afryka', 'Czarny'),
                                                           ('Azja', 'Zolty');

-- Wstawianie danych do tabeli events
INSERT INTO events (event_name, start_date, end_date, description, image_url, category_id) VALUES
('I wojna swiatowa', '1914-07-28', '1918-11-11', 'Najwiekszy konflikt zbrojny w Europie od czasu wojen napoleonskich.', 'https://assets.editorial.aetnd.com/uploads/2009/10/world-war-one-gettyimages-90007631.jpg', 1),
('II wojna swiatowa', '1939-09-01', '1945-09-02', 'Najwieksza i najkrwawsza wojna w dziejach, zaliczana do wojen totalnych.', 'https://cdn.britannica.com/26/188426-050-2AF26954/Germany-Poland-September-1-1939.jpg', 1),
('Wojna wietnamska', '1955-11-01', '1975-04-30', 'Dzialania militarne na Polwyspie Indochinskim.', 'https://assets.editorial.aetnd.com/uploads/2009/10/vietnam-war-gettyimages-615208290.jpg', 5);

-- Wstawianie danych do tabeli users
INSERT INTO users (username, password) VALUES ('admin', '$2a$12$vLqkVxkvG4hWP1RIvgaS6OhZqcc2AFxt1qGt3MjoGt2XJ7H/f66cq');

