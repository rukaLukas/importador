# importador
Extrai dados do banco relacional configurado e indexa no Elasticsearch

## Uso

Verifique que você tem o [Docker](https://docs.docker.com/get-docker/) instalado, clone o repositório.

No terminal de comandos, navegue até o diretório qual você clonou o projeto e execute o container `docker-compose up -d --build`.

Abaixo estão os serviços e suas portas que estarão disponíveis após docker subir os containers

- **php** - `:8001`
- **elasticsearch** - `:5432`

A configuraão da conexão com o banco de dados relacional qual realizará a consulta para extração dos dados é feita no arquivo [database/database.ini](database/database.ini)