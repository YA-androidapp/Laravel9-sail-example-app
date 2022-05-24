# Laravel9-sail-example-app

---

## Laravel 本体のインストール

```bash
curl -s "https://laravel.build/laravel-sail-example-app" | bash
cd laravel-sail-example-app && ./vendor/bin/sail up -d
```

- [http://localhost](http://localhost) へアクセスして動作確認

### Sail サービスの選択

[https://laravel.build/example-app?with=mysql,pgsql,mariadb,redis,memcached,meilisearch,minio,selenium,mailhog](https://laravel.build/example-app?with=mysql,pgsql,mariadb,redis,memcached,meilisearch,minio,selenium,mailhog) のようにカンマ区切りで指定。デフォルト値は `mysql,redis,meilisearch,mailhog,selenium`

## phpMyAdmin

- docker-compose.yml

```yaml
    phpmyadmin:
        image: phpmyadmin/phpmyadmin
        links:
            - mysql:mysql
        ports:
            - 8000:80
        environment:
            PMA_USER: "${DB_USERNAME}"
            PMA_PASSWORD: "${DB_PASSWORD}"
            PMA_HOST: mysql
        networks:
            - sail
```

- [http://localhost:8000](http://localhost:8000) へアクセスして動作確認
  - sail
  - password

## Laravel Breeze のインストール

```bash
./vendor/bin/sail composer require laravel/breeze --dev
./vendor/bin/sail php artisan breeze:install
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
./vendor/bin/sail php artisan migrate
```

- [http://localhost/register](http://localhost/register) へアクセスしてユーザー登録
- [http://localhost/login](http://localhost/login) へアクセスしてサインイン

## Laravel Lang のインストール

```bash
./vendor/bin/sail composer require laravel-lang/publisher laravel-lang/lang --dev
./vendor/bin/sail php artisan lang:add ja
# ./vendor/bin/sail php artisan lang:update
```

## CRUD アプリケーションの実装

```bash
./vendor/bin/sail php artisan make:model Item -m -c
```

---

Copyright (c) 2022 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
