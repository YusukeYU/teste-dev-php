# Instruções para rodar o projeto

Acesse a pasta /api e execute : 
docker-compose up -d

Em seguida, execute sua migrate :
docker-compose exec app php artisan migrate

Instale as dependências
docker-compose exec app composer install

Por último acesse a pasta web e rode o seguinte comando :
npm install

Por último : 
npm run serve
