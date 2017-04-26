<?php
class Produto
{
    private $data;
    
    function __get($prop)
    {
        return $this->data[$prop];
    }

    function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }
    
    public static function find($id)
    {
        $sql = "SELECT * FROM produto where id = '$id' ";
        print "$sql <br>\n";
        $conn = Transaction::get();
        $result = $conn->query($sql);
        return $result->fetchObject(__CLASS__);
    }
    
    public function save()
    {
        if (empty($this->data['id'])) {
            $id = $this->getLastId() +1;
            $sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, ".
                                   "      preco_venda, codigo_barras, data_cadastro, origem)" .
                                   " VALUES ('{$id}', " .
                                            "'{$this->descricao}', " .
                                            "'{$this->estoque}', " .
                                            "'{$this->preco_custo}', " .
                                            "'{$this->preco_venda}', " .
                                            "'{$this->codigo_barras}', " .
                                            "'{$this->data_cadastro}', " .
                                            "'{$this->origem}')";
        }
        else {
            $sql = "UPDATE produto SET descricao     = '{$this->descricao}', " .
                                "       estoque       = '{$this->estoque}', " .
                                "       preco_custo   = '{$this->preco_custo}', " .
                                "       preco_venda   = '{$this->preco_venda}', ".
                                "       codigo_barras = '{$this->codigo_barras}', ".
                                "       data_cadastro = '{$this->data_cadastro}', ".
                                "       origem        = '{$this->origem}' ".
                                "WHERE  id            = '{$this->id}'";
        }
        print "$sql <br>\n";
        $conn = Transaction::get();
        return $conn->exec($sql); // executa instrucao SQL 
    }
    
    private function getLastId()
    {
        $sql = "SELECT max(id) as max FROM produto";
        $conn = Transaction::get();
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data->max;
    }
}
