FROM php:latest

RUN apt-get update && apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html

COPY server.php .
COPY index.html .
COPY change_password_page.html .
COPY add_event.html .
COPY sql_scripts/ /sql_scripts/
COPY sql_scripts/ /sql_scripts/
COPY entrypoint.sh /entrypoint.sh

# Nadanie uprawnień do wykonania pliku entrypoint.sh
RUN chmod +x /entrypoint.sh

# Ustawienie entrypoint jako pliku entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
