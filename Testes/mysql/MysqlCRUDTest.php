<?php


namespace kis\testes;

use kis\sistema\interfaces\ITeste;
use kis\sistema\database\models\mysql\MysqlConnectionParams;
use kis\sistema\database\models\mysql\MysqlConnectionFactory;
use kis\sistema\database\models\mysql\MysqlConnectionPool;
use kis\sistema\database\models\mysql\MysqlCRUD;

class MysqlCRUDTest implements ITeste{
    
    private function InsertTest(array $queries, MysqlConnectionPool $mcp) {
        $crud =  new MysqlCRUD($mcp);
        foreach ($queries as $query) {
            $crud->insert($query);
        }
    }
    private function insertTestSetup() {
        $ConnectionParams = new MysqlConnectionParams();
        $ConnectionParams
                ->setDatabase("littlekis")
                ->setHost("127.0.0.1")
                ->setSenha("root")
                ->setUsuario("root");
        $ConnectionFactory = new MysqlConnectionFactory($ConnectionParams);
        $ConnectionPool = new MysqlConnectionPool(1, $ConnectionFactory);
        $queries = array();
        array_push($queries, "insert into t1 "
                . "(nome, sobrenome, idade) "
                . "values('Kevin', 'Rodrigues', 26)");
        array_push($queries, "insert into t1 "
                . "(nome, sobrenome, idade) "
                . "values('Ramon', 'de Lemos', 31)");
        array_push($queries, "insert into t1 "
                . "(nome, sobrenome, idade) "
                . "values('Gilberto', 'Moura', 26)");        
        
        $this->InsertTest($queries, $ConnectionPool);
        
        $this->clearData();
    }
    
//    private function Update(MysqlCRUD $crud) {
//        $crud->insert("insert into t1 "
//                . "(nome, sobrenome, idade) "
//                . "values('Kevin', 'Rodrigues', 26)");
//        $
//    }
    
    private function clearData(MysqlCRUD $crud) {
       $query = "Delete FROM littlekis.t1 where (t1.idT1 > 0);";
       $crud->delete($query);
         
    }
     
    
    public function executarTestes() {
        echo "Executando o teste do Crud <br>";
        echo 'Executando o Insert: <br>';
        $this->insertTestSetup();
    }

}
