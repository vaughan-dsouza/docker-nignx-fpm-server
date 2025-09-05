FROM php:8.2-fpm

# Install Nginx
RUN apt-get update && apt-get install -y nginx && rm -rf /var/lib/apt/lists/*

# Copy config files
COPY nginx.conf /etc/nginx/nginx.conf
COPY src/ /var/www/html/

# Expose ports
EXPOSE 80 443

# Run PHP-FPM + Nginx with supervisord
RUN apt-get update && apt-get install -y supervisor && rm -rf /var/lib/apt/lists/*
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["supervisord", "-n"]
