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
		//return $this->belongsTo('Work_type');
		return Work_type::find($this->work_type_id);
	}

	public function work_pictures(){
		return Work_picture::where('work_id', '=', $this->id)->get();
		//return $this->hasMany('Work_picture');
	}
}
