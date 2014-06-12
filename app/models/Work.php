<?php

class Work extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tipo_id' => 'required',
		'title' => 'required',
		'description' => 'required',
		'date' => 'required',
		'technologies' => 'required',
		'produced_in' => 'required',
		'produced_link' => 'required',
		'link' => 'required',
		'path' => 'required',
		'thumb' => 'required'
	);

	public function work_type(){
		return $this->hasOne("Work_type");
	}
}
