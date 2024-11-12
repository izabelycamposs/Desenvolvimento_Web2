<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cadastro = new Cadastro();
    $cadastro->ProcessarCadastro();
}

class Cadastro {
    private $conn;


    public function __construct() {
        try {
            $dsn = "mysql:host=localhost;dbname=vagas_db";
            $this->conn = new PDO($dsn, 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function ProcessarCadastro()
    {
        $nomeEmpresa = $_POST['nome_empresa'];
        $numeroWhatsapp = $_POST['numero_whatsapp'];
        $emailContato = $_POST['email_contato'];
        $descritivoVaga = $_POST['descricao_vaga'];
        $curso = $_POST['curso'];
    
        $this->cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso);
        echo'cadastro efetuado com sucesso!';
        
    header("Location:home.php");
    echo '<p>Você será redirecionado para a Home em 3 segundos...</p>';
    exit();

    }



    public function cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso) {
        try {
            $sql = "INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) 
                    VALUES (:nome_empresa, :numero_whatsapp, :email_contato, :descritivo_vaga, :curso)";
            
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome_empresa', $nomeEmpresa);
            $stmt->bindParam(':numero_whatsapp', $numeroWhatsapp);
            $stmt->bindParam(':email_contato', $emailContato);
            $stmt->bindParam(':descritivo_vaga', $descritivoVaga);
            $stmt->bindParam(':curso', $curso);

            $stmt->execute();

   
          
        } catch (PDOException $e) {
            return "Erro ao cadastrar a vaga: " . $e->getMessage();
        }
    }
    public function listarVagas() {
        try {
            $sql = "SELECT * FROM vagas";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            // Retorna todos os registros encontrados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao listar vagas: " . $e->getMessage());
        }
    }

    public function excluirVaga($id) {
        try {
            $sql = "DELETE FROM vagas WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Erro ao excluir vaga: " . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->conn = null; // Fechar a conexão
    }
}


?>
