<?php

class Work extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'work_type_id' => 'required',
		'title' => 'required',
		'date' => 'required',
		'technologies' => 'required',
		'produced_in' => 'required',
		'produced_link' => 'required',
		'path' => 'required',
		'thumb' => 'required'
	);

	public function work_type(){
		return Work_type::find($this->work_type_id);
	}
}
