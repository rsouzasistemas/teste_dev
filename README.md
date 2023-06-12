<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

Criei esse projeto para o teste de uma vaga de dev PHP e Laravel. Mas pretendo continuar incrementando ele, usando como fonte de estudos para as mais diversas técnicas e padrões.
A lista abaixo não reflete necessáriamente o conhecimento que já possuo (JWT e Auth por exemplo), são apenas alguns passos que pretendo incluir neste repositório ao passar do tempo.

- {Concluído} - Cadastro de usuários simples com Blade.
- {Concluído} - API para manipulação de usuários.
- {Concluído} - Resource para padronização de saída de dados na API.
- JWT.
- Auth.
- Repository.
- DTO.
- SOLID.
- VueJS (talvez fique separado).
- React (talvez fique separado).
- Docker.
- Jobs.

Inicialmente, o projeto é um repositório de estudo, mas, conforme evoluir, incluirei dicas e passo à passo de como fazer cada um dos tópicos.

## Instalação do projeto

O projeto usa Laravel 10+, logo, você precisa do PHP 8.1+ para conseguir executá-lo.
Quando a implementação do Docker estiver concluída, bastará subir a imagem e a mágica será feita, mas até lá, siga os passos abaixo:

- Clone o repositório para seu local de preferência. Obs: Não pretendo ensinar (não no momento), como criar um ambiente de trabalho local, pressuponho que você já sabe fazer isso.
- Entre na pasta do projeto e abra o Terminal ou CLI de sua preferência.
- Execute o composer install.
- O projeto usa o Bootstrap como framework CSS padrão, composer require laravel/ui.
- php artisan ui bootstrap.
- npm install
- npm run dev (se quiser brincar com o hot reload) ou use o npm run build.
- Certifique-se de que configurou o .env.
- php artisan migrate --seed (sim, vem com 101 dálmatas, digo, usuários para você testar!).