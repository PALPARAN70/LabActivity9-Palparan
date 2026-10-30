# LabActivity9-Palparan – Bakuna Tracker

Lab Activity 9 for 4-334 Full-Stack Web Development. This is the vaccination dashboard of the Barangay Matina Crossing Health Center, rebuilt in Laravel using Blade views, Tailwind CSS v3 (through PostCSS) and Vite. The schedule data comes from a seeded SQLite table.


## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Login

| | |
|---|---|
| Email | `nurse.palparan@bakuna.test` |
| Password | `bakuna2026` |

## How to run

You need PHP, Composer, Node.js and npm.

```bash
git clone https://github.com/PALPARAN70/LabActivity9-Palparan.git
cd LabActivity9-Palparan

composer install
npm install
```

Set up the `.env` file and app key:

```bash
cp .env.example .env        # Windows: copy .env.example .env
php artisan key:generate
```

Create the SQLite database file if it doesn't exist yet, then migrate and seed:

```bash
touch database/database.sqlite        # Windows: type nul > database\database.sqlite
php artisan migrate:fresh --seed
```

Run these in two terminals:

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Open http://127.0.0.1:8000. You'll be sent to the login page first.

To make a production build, run `npm run build`. It creates `public/build/manifest.json`.

## Pages

- `/login` – sign in with the seeded account
- `/dashboard` – alert banner, 4 stat cards and the full vaccination schedule
- `/schedule` – the same schedule grouped by month

Both `/dashboard` and `/schedule` need you to be logged in.

## Seeded data

`VaccinationSeeder` adds 7 rows covering BCG, Pentavalent, OPV, MMR, Anti-Flu and Hepatitis B (my own pick), including one row dated on my birthday. `DatabaseSeeder` also creates the login account above.

## What's inside

- `layouts/app.blade.php` – master layout with the nav, footer, `@yield('title')` and `@yield('content')`
- `components/stat-card`, `components/panel`, `components/status-badge` – Blade components
- `dashboard/index.blade.php` – alert banner (`@if` / `@elseif` / `@else`), stats grid and the schedule table (`@forelse` with `$loop`)
- `dashboard/schedule.blade.php` – monthly view
- `auth/login.blade.php` – login form with `@csrf`, `old()` and `@error`