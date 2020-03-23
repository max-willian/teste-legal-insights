Teste dev. Legal Insights: Max Willian Maluf
==============================

Pré requisitos
--------
- PHP (7.1 ou acima)
- Composer (1.10.1 ou acima)
- Node e npm (10.16 e 6.9 respectivamente, ou acima)

Instruções
--------

Após clonar o repositório existem algumas configurações a serem feitas
 
- Copie o arquivo `.env.example` e cole, renomeando-o para `.env`.
- Crie um arquivo com o nome `database.sqlite` dentro da pasta `database`
- Então, execute os seguintes comandos:

```
#instala as dependencias
composer install

#Gera uma chave de encriptação
php artisan key:generate

#roda as migrations
php artisan migrate

#popula a tabela de marcas
php artisan db:seed

#Instala as dependencias do front
npm install

#Coloca a aplicação para rodar, por padrão estará disponível em http://127.0.0.1:8000
php artisan serve
```

