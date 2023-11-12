-- Wstawianie danych do tabeli categories
INSERT INTO categories (category_name, category_color) VALUES
                                                           ('Europa', 'Niebieski'),
                                                           ('Ameryka Polnocna', 'Zielony'),
                                                           ('Ameryka Poludniowa', 'Czerwony'),
                                                           ('Afryka', 'Czarny'),
                                                           ('Azja', 'Zolty');

-- Wstawianie danych do tabeli events
INSERT INTO events (event_name, start_date, end_date, description, image_url, category_id) VALUES
('I wojna swiatowa', '1914-07-28', '1918-11-11', 'Pierwsza wojna swiatowa wybuchka na skutek skomplikowanego systemu sojuszniczego i narastajacych napiec w Europie, zwiazanych z terytorialnymi roszczeniami, zbrojeniami i konkurencja imperialistyczna. Konflikt przyniosl ogromne straty ludzkie, z milionami ofiar. Jego zakonczenie w 1918 roku wplynelo na ksztaltowanie sie nowego porzadku politycznego i spolecznego na arenie miedzynarodowej.', 'https://assets.editorial.aetnd.com/uploads/2009/10/world-war-one-gettyimages-90007631.jpg', 1),
('II wojna swiatowa', '1939-09-01', '1945-09-02', 'Druga wojna swiatowa trwaka od 1939 do 1945 roku i byla globalnym konfliktem zbrojnym, w ktorym uczestniczyly glowne mocarstwa swiata. Wybuchla po inwazji Niemiec na Polske, co spowodowalo reakcje ze strony Wielkiej Brytanii i Francji. Konflikt zakonczyl sie kapitulacja Niemiec i Japonii w 1945 roku.', 'https://cdn.britannica.com/26/188426-050-2AF26954/Germany-Poland-September-1-1939.jpg', 1),
('Wojna wietnamska', '1955-11-01', '1975-04-30', 'Wojna w Wietnamie trwala od 1955 do 1975 roku i byla jednym z najbardziej skomplikowanych konfliktow zimnej wojny. Stany Zjednoczone wspieraly rzad Poludniowego Wietnamu w walce z komunistyczna Polnoca, angazujac duze sily wojskowe. Wojna jednak zakonczyla sie zwyciestwem Polnocnej strony.', 'https://assets.editorial.aetnd.com/uploads/2009/10/vietnam-war-gettyimages-615208290.jpg', 5);

-- Wstawianie danych do tabeli users
INSERT INTO users (username, password) VALUES ('admin', '$2a$12$vLqkVxkvG4hWP1RIvgaS6OhZqcc2AFxt1qGt3MjoGt2XJ7H/f66cq');

