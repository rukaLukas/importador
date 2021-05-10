<?php

namespace App;

use PDO;
use Database\Connection;
use Elasticsearch\ClientBuilder;

class Importador
{
    private $clientElasticSearch;

    function __construct() {
        $hosts = [                
            'http://elasticsearch:9200',
       ];
        $this->clientElasticSearch = ClientBuilder::create()
                                ->setHosts($hosts)
                                ->build();  
    }

    public function exec()
    {
        try {            
            $noticias = $this->obterNoticias();                  

            $params = $this->preparaDadosParaIndexacao($noticias);            
            
            $ret = $this->clientElasticSearch->bulk($params); 
                            
            if($ret['errors']) {
                echo "Falha ao processar importador";
                return;
            }

            echo "Importação concluída";
        } catch (\PDOException $e) {
            Log::registrar($e->getMessage());                       
        }
    }

    private function obterNoticias()
    {
        try {
            $conn = Connection::get()->connect();

            $sth = $conn->prepare("SELECT * FROM noticias");
            $sth->execute();
        
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function preparaDadosParaIndexacao(array $data)
    {
        foreach($data as $noticia) {            
            $params['body'][] = [
                'index' => [
                    '_index' => 'knwein',
                    '_type' => 'noticias'
                ]
            ];

            $params['body'][] = [
                'conteudo' => $noticia['conteudo'],
                'subtitulo' => $noticia['subtitulo'],
                'fonte' => $noticia['fonte'],
                'titulo' => $noticia['titulo'],
                'data_publicacao' => $noticia['data_publicacao'],
                'url' => $noticia['url']
            ];
        }

        return $params;
    }
}