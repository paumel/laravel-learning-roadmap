#Laravel learning roadmap checklist
###Based on https://github.com/LaravelDaily/Laravel-Roadmap-Learning-Path

- To install project run:

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

- Copy .env.example to .env:
```bash
cp .env.example .env
```

- Configure bash alias:
```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

- Start sail:
```bash
sail up -d
```

To stop sail
```bash
sail stop
```

- Install npm dependencies

```bash
sail npm ci
```

Build assets:

```bash
sail npm run dev
```

- Generate app key:
```bash
sail php artisan key:generate
```

- Run migrations and seeder:
```bash
sail php artisan migrate --seed
```


---
You can specify app port by adding APP_PORT variable in your .env file (default port - 80). 
You can specify database port by adding FORWARD_DB_PORT variable in your .env file (default port - 3306). 
---

You are good to go - http://localhost or http://localhost:APP_PORT
