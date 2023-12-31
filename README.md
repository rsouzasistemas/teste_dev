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
- php artisan key:generate
- O projeto usa o Bootstrap como framework CSS padrão.
- npm install
- npm run dev (se quiser brincar com o hot reload) ou use o npm run build.
- Certifique-se de que configurou o .env.
- php artisan migrate --seed (sim, vem com 101 dálmatas, digo, usuários para você testar!).

Seguindo esses passos, o projeto será executado tranquilamente.

## Algumas observações

- Existe dentro de app/ uma pasta chamada "__ExtraTables". Nela estão contidos 2 arquivos SQL: states.sql e cities.sql. Estes arquivos são utilizados durante o Seed, para popular as tabelas de respectivos nomes, mantendo o padrão de nomes. As listas são de 2022, então espero que em Cities ainda não tenha mudado nada.
- Caso tenha alguma dúvida sobre as rotas disponíveis na API, execute: php artisan route:list e poderá notar 2 rotas "extras", api/states, que retorna a lista de estados e seus IDs e api/cities/{stateId?} que retorna a lista completa de cidades e seus IDs, mas, como parâmetro opcional, você pode fornecer o ID do estado, assim somente as cidades ligadas a este ID serão retornadas.
- Note que na lista de rotas, existe um GET e um POST para api/users. Com o GET você obterá uma lista paginada de todos os usuários. Já com o POST, você poderá aplicar filtros e obterá uma lista paginada somente com os resultados deste filtro.
- Todos os campos podem ser usados como parâmetro de filtro, com excessão de "password", que só pode ser preenchido durante o cadastro ou edição de um usuário. Os campos de Users são:
-- state_id
-- city_id
-- name
-- email
-- password
-- gender
-- cpf
-- birth
-- address

Em breve anexarei o link da documentação online da API.