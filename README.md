# importador
Extrai dados do banco relacional configurado e indexa no Elasticsearch

## Uso

Verifique que você tem o [Docker](https://docs.docker.com/get-docker/) instalado, clone o repositório.

No terminal de comandos, navegue até o diretório qual você clonou o projeto e execute o container `docker-compose up -d --build`.

Abaixo estão os serviços e suas portas que estarão disponíveis após docker subir os containers

- **php** - `:8001`
- **elasticsearch** - `:9200`

** OBS: deve ser executado em paralelo com o projeto [knewin_appapi](https://github.com/rukaLukas/appapi) para ter acesso ao banco que possui os dados a serem exportados.

A configuraão da conexão com o banco de dados relacional qual realizará a consulta para extração dos dados é feita no arquivo [database/database.ini](database/database.ini)
