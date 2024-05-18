FROM php:8.1-fpm

# Instalar dependências necessárias para o driver PDO DBLIB
RUN apt-get update && apt-get install -y --no-install-recommends \
    freetds-bin \
    freetds-dev \
    && ln -s /usr/lib/x86_64-linux-gnu/libsybdb.so /usr/lib/libsybdb.so \
    && docker-php-ext-install pdo_dblib

# Instalar os drivers para MySQL (opcional, se necessário)
RUN docker-php-ext-install mysqli pdo_mysql

# Limpar o cache de pacotes
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
