# VaiVan - MVP SaaS

Projeto SaaS multiempresa para gestão de transporte escolar e fretamento.

## Stack

- PHP 8.3
- Laravel 11
- MySQL 8
- Docker + Nginx
- Redis (opcional, já preparado)
- Blade + Livewire
- Sanctum

## Setup

```bash
docker compose up -d --build
docker compose exec app composer install
docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

## Fase 1 (fundação)

- Base de autenticação e roles
- Middleware de contexto de empresa
- Trait global para escopo por `company_id`
- Layout admin inicial

## Fase 2 (banco + models)

Entidades modeladas com migrations, FKs e relacionamentos Eloquent:

- `companies`
- `users`
- `drivers`
- `vehicles`
- `guardians`
- `passengers`
- `passenger_schedule_days`
- `routes`
- `route_passengers`
- `trips`
- `trip_passengers`
- `vehicle_locations`
- `payments`
- `notifications`
- `subscriptions`

### Seed mínimo

- Super admin global: `admin@vaivan.com`
- Empresa demo
- Admin da empresa demo: `admin.demo@vaivan.com`

> Senha inicial dos usuários seed: `ChangeMe123!` (trocar no primeiro acesso)
