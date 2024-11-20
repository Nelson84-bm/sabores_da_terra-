<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $pessoas = $_POST['pessoas'];

    // Aqui você pode salvar os dados no banco de dados ou enviar um email.
    echo "Reserva confirmada para $nome no dia $data às $hora.";
} else {
    echo "Erro ao processar reserva.";
}
?>
