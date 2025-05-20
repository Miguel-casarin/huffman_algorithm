# Huffman algorithm in PHP

 This code implements a Huffman algorithm in PHP using a simple front-end page.

 ## Front-end
 The file index.phh is responsible for make the webpage and link the Huffman algorithm in huffman.php file.
 ```php
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
```
## Huffman 

In file huffman.php the class class nodetree define and epresent each node in the Huffman tree.
```php
class nodetree {
            public $left;
            public $right;
    
            function __construct($left = null, $right = null){
                $this -> left = $left;
                $this -> right = $right;
            }
    
            function children(){
                return [$this -> left, $this -> right];
            }
    
            function nodes(){
                return [$this -> left, $this -> right];  
            }
    
            function __toString(){
                return $this -> left . '_' . $this -> right; 
            }
        }
```
Function huffman_code_tree walks the tree and generates a binary string for each character.
```php
 function huffman_code_tree($node, $left = true, $binString = ''){
            if(is_string($node)){
                return [$node => $binString];
            }
    
            list($l, $r) = $node -> children();
    
            $d = [];
            $d = array_merge($d, huffman_code_tree($l, true, $binString . '0'));
            $d = array_merge($d, huffman_code_tree($r, false, $binString . '1'));
    
            return $d;
        }
```
This part counting character frequencies.
```php
$freq = [];
        for($i = 0; $i < strlen($string); $i = $i + 1){
            $c = $string[$i];
            if(isset($freq[$c])){
                $freq[$c] = $freq[$c] + 1;
            } else {
                $freq[$c] = 1;
            }
        }
```
Converts the frequency map into a sorted array of [character, frequency] pairs for tree construction.
```php
$freq_items = [];
        foreach($freq as $char => $count){
            $freq_items[] = [$char, $count];
        }
    
        usort($freq_items, function($a, $b){
            
            return $a[1] <=> $b[1];
        });
```
Build Huffman tree
```php
$nodes = $freq_items;
```
```php
```
```php
```


