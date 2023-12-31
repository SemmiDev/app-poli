## Required Software

1. [XAMPP](https://www.apachefriends.org/download.html)
2. [Git](https://git-scm.com/downloads)
3. [Composer](https://getcomposer.org/download/)
4. [NodeJS](https://nodejs.org/en/download/)

## Installation guide

```bash
  git clone https://github.com/SemmiDev/app-poli.git
  or
  Download zip file
```

```bash
  cd app-poli
```


```bash
  cp .env.example .env
```

```bash
  composer install
```

```bash
  php artisan key:generate
```

```bash
  php artisan migrate
```

```bash
  php artisan db:seed
```

```bash
  php artisan serve
```

```bash
  # Open new cmd/terminal
  npm install && npm run dev
```
