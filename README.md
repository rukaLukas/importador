# importador
Extrai dados do banco relacional configurado e indexa no Elasticsearch
a
## Uso

Verifique que você tem o [Docker](https://docs.docker.com/get-docker/) instalado, clone o repositório.

No terminal de comandos, navegue até o diretório qual você clonou o projeto e execute o container `docker-compose up -d --build`.

Abaixo estão os serviços e suas portas que estarão disponíveis após docker subir os containers

- **php** - `:8001`
- **elasticsearch** - `:5432`