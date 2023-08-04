FROM php:apache

RUN apt update \
    && apt install -y apache2 net-tools \
    && apt clean \
    && rm -rf /var/www/html/*

# Expose port 80
EXPOSE 80

# Copy the index.php file to /var/www/html
COPY index.php /var/www/html/

# Start Apache in foreground when the container launches
CMD ["apache2-foreground"]:
