<?php

class Work_picture extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'work_id' => 'required',
		'title' => 'required',
		'picture' => 'required'
	);
}
