<?php 
// exibe início da tabela 
echo '<table border=1 style="min-width:500px"> 
      <tr bgcolor=#c0c0c0> 
        <td align="center"></td> 
        <td align="center">Código</td> 
        <td align="center">Nome</td> 
      </tr>'; 

// abre conexão com Postgres 
$conn = pg_connect("host=localhost port=5432 dbname=livro user=postgres"); 

// define consulta que será realizada 
$query = 'select codigo, nome from famosos'; 

// envia consulta ao banco de dados 
$result = pg_query($conn, $query); 

if ($result) { 
    // percorre resultados da pesquisa 
    while ($row = pg_fetch_assoc($result)) { 
        $codigo = $row['codigo']; 
        $nome   = $row['nome']; 

        // exibe uma linha de resultados 
        echo "<tr> 
                <td align='center'><a href='edit.php?codigo={$codigo}'> Editar </a></td> 
                <td align='center'>{$codigo}</td> 
                <td align='left'>{$nome}</td> 
              </tr>"; 
    } 
} 
// fecha a conexão 
pg_close($conn); 

// imprime fechamento da tabela 
echo '</table>'; 