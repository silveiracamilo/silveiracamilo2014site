<?php

class Admin_Work_picturesController extends Admin_BaseController {

	/**
	 * Work_picture Repository
	 *
	 * @var Work_picture
	 */
	protected $work_picture;

	public function __construct(Work_picture $work_picture)
	{
		$this->work_picture = $work_picture;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$work_pictures = $this->work_picture->all();

		return View::make('admin.work_pictures.index', compact('work_pictures'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($work_id)
	{
		return View::make('admin.work_pictures.create', compact('work_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Work_picture::$rules);

		if ($validation->passes())
		{
			$input['picture'] = $this->uploadFile($input, 'picture');

			$this->work_picture->create($input);

			return Redirect::to('/admin/works/'.$input["work_id"]."#pictures");
		}

		return Redirect::to('/admin/work_pictures/create/'.$input["work_id"])
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$work_picture = $this->work_picture->findOrFail($id);

		return View::make('admin.work_pictures.show', compact('work_picture'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work_picture = $this->work_picture->find($id);

		if (is_null($work_picture))
		{
			return Redirect::route('admin.works.index');
		}

		return View::make('admin.work_pictures.edit', compact('work_picture'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Work_picture::$rules);

		if ($validation->passes())
		{
			$work_picture = $this->work_picture->find($id);

			if (Input::hasFile('pictureN')) {
				$input['picture'] = $this->uploadFile($input, 'pictureN');
				
				if($work_picture->picture!=null) $this->deleteFile($work_picture->picture);			
			}

			unset($input['pictureN']);

			$work_picture->update($input);

			return Redirect::to('/admin/works/'.$input["work_id"]."#pictures");
		}

		return Redirect::route('admin.work_pictures.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$work_picture = $this->work_picture->find($id);

		File::delete(public_path().$work_picture->picture);
		$work_id = $work_picture->work_id;
		$work_picture->delete();

		return Redirect::to('/admin/works/'.$work_id."#pictures");
	}

	protected function uploadFile($input, $name){
		if (Input::hasFile($name))
		{
			$extension = Input::file($name)->getClientOriginalExtension();
			$na = explode(".", Input::file($name)->getClientOriginalName());
			$name_file = $na[0].str_random(4).".".$extension;
			$path = '/uploads/work_pictures/'.$extension."/";
		    
		    Input::file($name)->move(public_path().$path, $name_file);

		    return $path.$name_file;
		}

		return $input[$name];
	}

	protected function deleteFile($file_path){
		File::delete(public_path().$file_path);
	}

}
