FROM dunglas/frankenphp

RUN apt-get update && apt-get install -y git unzip zip

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd pdo_mysql bcmath zip intl opcache

COPY --from=composer:2.7.2 /usr/bin/composer /usr/local/bin/composer

RUN composer self-update
RUN apt update

# install the PHP APCu extension
RUN mkdir -p /usr/src/php/ext/apcu && curl -fsSL https://pecl.php.net/get/apcu | tar xvz -C "/usr/src/php/ext/apcu" --strip 1 && docker-php-ext-install apcu

# Install xsl extension
RUN apt install -y libxslt-dev
RUN docker-php-ext-install xsl

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install symfony-cli

ENV APP_RUNTIME=Runtime\\FrankenPhpSymfony\\Runtime
ENV FRANKENPHP_CONFIG="worker ./public/index.php"

COPY ../../source /app/
