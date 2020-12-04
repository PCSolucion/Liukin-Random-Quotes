
<div class="wrap">
    <?php
        echo "<h1 class='wp-heading-inline'>Liukin Random Quotes  </h1>";
    ?>



<table class="form-table" role="presentation">
		<tr class="form-field form-required term-name-wrap">
			<th scope="row"><label for="name"><?php _ex( 'Quote', 'term name' ); ?></label></th>
			<td><input name="name" id="name" type="text" value="<?php echo $tag_name_value; ?>" size="40" aria-required="true" />
			<p class="description"><?php _e( 'Add here the quote.' ); ?></p></td>

		</tr>


	</table>
    <?php submit_button( __( 'Add Quote' ), 'primary', null, false ); ?>



<br/>
<br/>
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