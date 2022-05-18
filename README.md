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

---

Copyright (c) 2022 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
