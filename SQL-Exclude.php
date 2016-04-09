	function sql_exclude($table_name){
		global $wpdb;
		$sql = $wpdb->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= %s AND COLUMN_NAME != 'id'",$this->prefix.$table_name);
		$columns_object = $wpdb->get_results($sql);
		$columns = "";
		foreach($columns_object as $key=>$column){
		 	$columns .= $column->COLUMN_NAME.",";
		 }
		 rtrim($columns,",");
		 $sql = $wpdb->prepare("SELECT %s FROM %s",$columns,$this->prefix.$table_name);
	     return($wpdb->get_results($sql));	
	}
