<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>Algoritmo de Huffman</title>
</head>
<body>
    <header>
        <h1>Algoritmo de Huffman</h1>
    </header>

    <main>
        
            <section>
                <article>
                    <h2>Descrevendo o algoritmo de Huffman</h2>
                    <p>O algoritmo de Huffman é um método de compressão de dados sem perdas que reduz o tamanho de arquivos ao atribuir códigos binários mais curtos para caracteres mais frequentes e códigos mais longos para os menos frequentes. Ele funciona construindo uma árvore binária onde cada folha representa um símbolo da entrada, e os caminhos da raiz até cada folha formam os códigos binários. A construção da árvore é feita de forma eficiente utilizando uma fila de prioridade, garantindo que a codificação resultante seja otimizada e sem ambiguidade.</p>
                </article>
                <codigo>
                    <?php include 'huffman.php'; ?>
                </codigo>
                <aside>
                    <p>Desenvolvido por <strong>MIGUEL CASARIN DA SILVA.</strong></p>
                </aside>
            </section>
        
    </main>
</body>
</html>