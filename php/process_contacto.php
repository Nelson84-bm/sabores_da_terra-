<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];


    $para = "nelsonbatolomeu@gmail.com";

    // Cabeçalhos do e-mail
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Corpo da mensagem
    $corpo_email = "Nome: $nome\n";
    $corpo_email .= "Email: $email\n";
    $corpo_email .= "Assunto: $assunto\n";
    $corpo_email .= "Mensagem:\n$mensagem\n";

    // Envia o e-mail
    if (mail($para, $assunto, $corpo_email, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha no envio da mensagem.";
    }

    // Conectar ao banco de dados local
    $servername = "localhost";
    $username = "root";        // Usuário padrão do MySQL no XAMPP
    $password = "";            // Sem senha por padrão no XAMPP
    $dbname = "sabores_da_terra";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara a SQL para inserir os dados
    $sql = "INSERT INTO contatos (nome, email, assunto, mensagem)
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    // Executa a inserção
    if ($conn->query($sql) === TRUE) {
        echo "Dados armazenados com sucesso!";
    } else {
        echo "Erro ao armazenar os dados: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>













