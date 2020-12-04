
<div class="wrap">
    <?php
        echo "<h1 class='wp-heading-inline'>Liukin Random Quotes  </h1>";
    ?>
<form method = "post" action = ""> 

<h3>Add a New Quote</h3>
<p> 
   <label for="name">Quote:</label>
   <input type="text" name="name"/>
</p>
<hr>
<input type="submit" value="Submit" name="quote_submit"/> 
</form>
<br/>
<br/>
<?php
    function add_new_quote() {

      $name         = $_POST['name'];
      

      global $wpdb; //removed $name and $description there is no need to assign them to a global variable
      $table_name = $wpdb->prefix . "liukin_quotes"; //try not using Uppercase letters or blank spaces when naming db tables

      $wpdb->insert($table_name, array(
                                'Quote' => $name,
        );
      }
    

//And now to connect the  two:  
if( isset($_POST['quote']) ) add_new_quote();
?>


<!--<a href="add_quotes.php" class="page-title-action">Añadir nueva</a>
    <br/>-->
    <table class="wp-list-table widefat fixed striped pages">
                <thead>
                    <th >Frases</th>
                    <th >Acciones</th>
                </thead>
                <tbody id="the-list">
                                <tr>
                                    <td>Frase 1</td>
                                    <td>
                                      <a class='page-title-action'>No mostrar</a>
                                      <a class='page-title-action'>Borrar</a>
                                    </td>
                                </tr>
                </tbody>
        </table>
</div>