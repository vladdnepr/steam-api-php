FROM php:8.1.3-cli-alpine3.15

# Set working directory
WORKDIR /var/www

RUN apk update && apk upgrade \
    && apk add --no-cache \
    	bash \
		vim \
	&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
# Add non root user
    && addgroup -g 1000 -S www \
    && adduser -u 1000 -S www -G www

# Change current user to www
USER www
