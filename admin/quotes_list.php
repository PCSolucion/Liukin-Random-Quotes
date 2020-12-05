<div class="wrap">
    <?php
        echo "<h1 class='wp-heading-inline'>Liukin Random Quotes</h1>";
    ?>
<br/>
<br/>
<br/>
<form method="post" action=""> 
Quote: <input type="text" name="name" size="80" id="name" /> 
<input type="submit" name="submit"/> 
</form>
<?php
if ( isset( $_POST['submit'] ) ){
    global $wpdb;
    $tablename=$wpdb->prefix.'liukin_quotes';
    $data=array( 
        'Quote' => $_POST['name'],
        );
     $wpdb->insert( $tablename, $data);
     echo "<meta http-equiv='refresh' content='0'>";
}
?>
<br/>
<br/>
<hr/>
<br/>
<?php
global $wpdb;
// this adds the prefix which is set by the user upon instillation of wordpress
$table_name = $wpdb->prefix . "liukin_quotes";
// this will get the data from your table
$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name" );
?>
<table class="wp-list-table widefat fixed striped pages">
    <thead>
     <th class="quotehead">Quote</th>
    </thead>

      <?php
        global $wpdb;
        foreach ($retrieve_data as $retrieved_data){ ?>
            <tr>
                  <td> <?php echo $retrieved_data->Quote;?> </td>
          </tr>
            <?php }
      ?>
</table> 
</div>