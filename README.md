# Instruções para rodar o projeto

Acesse a pasta /api e execute : 
docker-compose up -d

Para configurar o banco execute o comando abaixo e copie o ipAddress :
docker inspect car-management-db

Crie seu arquivo .env atraves de env.example e em seguida edite a linha db host com o ip copiado do seu container.

Em seguida, execute sua migrate :
docker-compose exec app php artisan migrate

Por último acesse a pasta web e rode o seguinte comando :
npm run serve
