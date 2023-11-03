-- Wstawianie danych do tabeli categories
INSERT INTO categories (category_name, category_color) VALUES
                                                           ('Europa', 'Niebieski'),
                                                           ('Ameryka Północna', 'Zielony'),
                                                           ('Ameryka Południowa', 'Czerwony'),
                                                           ('Afryka', 'Czarny'),
                                                           ('Azja', 'Żółty');

-- Wstawianie danych do tabeli events
INSERT INTO events (event_name, start_date, end_date, description, image_url, category_id) VALUES
('I wojna światowa', '1914-07-28', '1918-11-11', 'Największy konflikt zbrojny w Europie od czasu wojen napoleońskich.', 'link-do-zdjecia/WW1.jpg', 1),
('II wojna światowa', '1939-09-01', '1945-09-02', 'Największa i najkrwawsza wojna w dziejach, zaliczana do wojen totalnych', 'link-do-zdjecia/WW2.jpg', 1),
('Wojna wietnamska', '1955-11-01', '1975-04-30', 'Działania militarne na Półwyspie Indochińskim.', 'link-do-zdjecia/VW.jpg', 5);

-- Wstawianie danych do tabeli users
INSERT INTO users (username, password) VALUES
                                           ('admin', 'pass');
