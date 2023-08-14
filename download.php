<?php
// Verifica se foi enviado um parâmetro 'imagem' via GET
if(isset($_GET['imagem'])) {
    // Caminho para a imagem gerada (pode ser ajustado conforme a sua estrutura de pastas)
    $imagemPath = 'caminho/para/as/imagens/' . $_GET['imagem'];

    // Verifica se a imagem existe
    if(file_exists($imagemPath)) {
        // Define o cabeçalho para o download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($imagemPath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($imagemPath));
        readfile($imagemPath);
        exit;
    } else {
        echo "A imagem não foi encontrada.";
    }
} else {
    echo "Parâmetro 'imagem' não especificado.";
}
?>
