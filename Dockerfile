FROM php:7.3
COPY . /usr/src/app
WORKDIR /usr/src/app

RUN apt-get -y update

RUN apt-get -y install \
    git \
    zlib1g-dev \
    zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer