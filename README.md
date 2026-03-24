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
=======
# VaiVan - MVP SaaS (Fase 1)

Base inicial do projeto **VaiVan** com foco em Laravel 11, multiempresa e organização para evolução por fases.

## O que está pronto na Fase 1

- Estrutura inicial de projeto em padrão Laravel.
- Docker com serviços: `app` (PHP-FPM 8.3), `nginx`, `mysql` e `redis`.
- `.env.example` coerente com ambiente Docker.
- Base de autenticação preparada com `User` + `Sanctum` no modelo.
- Perfis básicos via enum:
  - `super_admin`
  - `company_admin`
  - `company_operator`
  - `driver`
  - `guardian`
- Seed inicial com super admin.
- Middleware para garantir contexto de empresa.
- Trait com escopo global de `company_id` para tabelas multiempresa.
- Layout administrativo inicial com navegação lateral.

## Como subir com Docker

```bash
docker compose up -d --build
```

## Instalação das dependências

> Em ambientes com acesso à internet:

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

## Credencial inicial

- **E-mail:** `admin@vaivan.com`
- **Senha:** `ChangeMe123!`

> Trocar senha imediatamente no primeiro acesso.

## Próximos passos (Fase 2)

- Criar migrations das entidades de domínio.
- Criar models e relacionamentos.
- Adicionar factories e seeders básicos adicionais.
