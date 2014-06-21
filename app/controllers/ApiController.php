<?php

class ApiController extends BaseController {

	public function home(){
		$home = Home::all()[0];
		$works = Work::orderBy('date', 'Desc')->take(5)->get();

		return Response::json(array('home'=>$home, 'works'=>$works));
	}

	public function works(){
		$works = Work::join('work_types', 'works.work_type_id', '=', 'work_types.id')->orderBy('date', 'Desc')->get(array('works.*', 'work_types.name as work_type_name'));
		$work_types = Work_type::all();

		return Response::json(array('works'=>$works, 'work_types'=>$work_types));
	}

	public function work($path){
		$work = Work::where('path', '=', $path)->get()[0];

		return Response::json(array('work'=>$work, 'work_pictures'=>$work->work_pictures()));
	}

	public function about(){
		$about = About::all()[0];

		return Response::json($about);
	}

	public function services(){
		$services = Service::all();

		return Response::json($services);
	}

	public function sendContact(){
		if(Request::isMethod('post')){
			$input = Input::all();

			Mail::send('emails.contact', $input, function($message) use ($input)
			{
			    $message->to('silveiracamilo@gmail.com', "Camilo")->subject($input['name'].' | Contato silveiracamilo.com.br');			    
			});

			return Response::json(array('success'=>true));
		}

		return Response::json(array('success'=>false));
	}
}