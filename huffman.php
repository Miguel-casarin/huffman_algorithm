<?php
    echo '<form method="POST">
    <label for="inputString">Digite uma string:</label>
    <input type="text" id="inputString" name="inputString" required>
    <button type="submit">Codificar</button>
    </form><hr>';

    echo '<form method="GET" style="display:inline-block; margin-left: 10px;">
    <button type="submit">Limpar</button>
    </form><hr>';


    $string = isset($_POST['inputString']) ? $_POST['inputString'] : '';

    if (!empty($string)){
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
    
        $freq = [];
        for($i = 0; $i < strlen($string); $i = $i + 1){
            $c = $string[$i];
            if(isset($freq[$c])){
                $freq[$c] = $freq[$c] + 1;
            } else {
                $freq[$c] = 1;
            }
        }
    
        $freq_items = [];
        foreach($freq as $char => $count){
            $freq_items[] = [$char, $count];
        }
    
        usort($freq_items, function($a, $b){
            
            return $a[1] <=> $b[1];
        });
    
        $nodes = $freq_items;
    
        while(count($nodes) > 1){
            $first = array_shift($nodes);
            $second = array_shift($nodes);
    
            list($key1, $c1) = $first;
            list($key2, $c2) = $second;
    
            $node = new nodetree($key1, $key2);
            $nodes[] = [$node, $c1 + $c2];
    
            usort($nodes, function($a, $b){
                if ($a[1] == $b[1]) {
                    return strcmp((string)$a[0], (string)$b[0]);
                }
                return $a[1] <=> $b[1];
            });
        }
    
        $huffmanCode = huffman_code_tree($nodes[0][0]);
    
        echo "Char | Huffman code <br>";
        echo "----------------------<br>";
    
        for ($i = 0; $i < 256; $i = $i + 1) {
            $char = chr($i);
            if (isset($freq[$char])) {
                echo sprintf(" %-4s |%12s<br>", $char, $huffmanCode[$char] ?? "");
            }
        }
    
        echo "<br><strong>String codificada:</strong><br>";
        $encodedString = '';
        for($i = 0; $i < strlen($string); $i = $i + 1){
            $encodedString .= $huffmanCode[$string[$i]];
        }
    
        echo $encodedString;
    }
?>