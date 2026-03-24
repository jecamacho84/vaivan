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
