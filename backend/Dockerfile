FROM php:latest
USER root

RUN apt-get update && apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli

RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip

WORKDIR /var/www/html

COPY server.php .
COPY index.html .
COPY change_password_page.html .
COPY add_event.html .
COPY sql_scripts/ /sql_scripts/
COPY sql_scripts/ /sql_scripts/
COPY entrypoint.sh /entrypoint.sh

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN php composer.phar require rbdwllr/reallysimplejwt

# Nadanie uprawnień do wykonania pliku entrypoint.sh
RUN chmod +x /entrypoint.sh

# Ustawienie entrypoint jako pliku entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
