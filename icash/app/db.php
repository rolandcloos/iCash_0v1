<?php

namespace icash\app;

class DB
{


    private $statement;
    public $connection;
    private $error;

    function __construct() {
        $this->config = APP_CONFIG['DB'];
        $this->connect();
    }

    public function quote( $param ) {
        return $this->connection->quote( $param );
    }

    public function query( $query ) {
        $this->statement = $this->connection->prepare( $query );
        return $this;
    }

    public function param( $param, $value ) {
        switch( true ) {
            case is_int( $value ): {
                $this->statement->bindValue( $param, $value, \PDO::PARAM_INT );
                break;
            }
            case is_bool( $value ): {
                $this->statement->bindValue( $param, $value, \PDO::PARAM_BOOL );
                break;
            }
            case is_null( $value ): {
                $this->statement->bindValue( $param, $value, \PDO::PARAM_NULL );
                break;
            }
            default: {
                $this->statement->bindValue( $param, $value, \PDO::PARAM_STR );
            }
        }
    }

    public function execute( $params = array() ) {
        if (count( $params ) > 0) {
            return $this->statement->execute( $params );
        } else {
            return $this->statement->execute();
        }
    }

    public function value() {
        $this->execute();
        return $this->statement->fetchColumn();
    }

    public function result() {
        $this->execute();
        return $this->statement->fetch( \PDO::FETCH_ASSOC );
    }

    public function results() {
        $this->execute();
        return $this->statement->fetchAll( \PDO::FETCH_ASSOC );
    }

    public function count() {
        $this->execute();
        return $this->statement->rowCount();
    }

    private function connect() {
            extract($this->config);
            $conString = "mysql:host=" . $host . ";dbname=" . $db . ";charset=UTF8MB4";
            $connectionString  = "mysql:host=$host;port=$port;dbname=$db;charset=UTF8MB4;";
            try
            {
                $this->connection = new \PDO($connectionString, $user, $password);     
            } catch (\PDOException $e) {
                $GLOBALS['error']['DB'][] = $e->getMessage();
            }
    }

}