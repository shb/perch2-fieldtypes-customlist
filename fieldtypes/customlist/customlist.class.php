<?php

/**
 * Custom List field type
 * 
 * <perch:content type="customlist" page="" region="" options="" values=""/>
 * 
 * Deliberately follow dataselect schema.
 */

class PerchFieldType_customlist extends PerchFieldType_dataselect
{

	public function render_inputs($details=array())
	{
		$table = $this->Tag->page();

		$collection = $this->Tag->region();
		if(!empty($collection))
			$table .= '_'.$collection;
		if(defined('PERCH_DB_PREFIX'))
			$table = PERCH_DB_PREFIX.$table;
		
		$values = $this->Tag->values();
		$options = $this->Tag->options();
		if(empty($values))
			$values = $options;

		$db = PerchDB::fetch();
		$opts = $db->get_rows("SELECT `$options` as label,`$values` as value FROM `$table`");

		return $this->Form->select(
			$this->Tag->input_id(),
			$opts,
			$this->Form->get($details, $this->Tag->id(), $this->Tag->default(), $this->Tag->post_prefix())
		);
	}
}
