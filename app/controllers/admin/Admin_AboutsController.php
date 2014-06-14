<?php

class Admin_AboutsController extends Admin_BaseController {

	/**
	 * About Repository
	 *
	 * @var About
	 */
	protected $about;

	public function __construct(About $about)
	{
		$this->about = $about;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$abouts = $this->about->all();

		return View::make('admin.abouts.index', compact('abouts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.abouts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, About::$rules);

		if ($validation->passes())
		{
			$input['picture'] = $this->uploadPicture($input, "picture");

			$this->about->create($input);

			return Redirect::route('admin.abouts.index');
		}

		return Redirect::route('admin.abouts.create')
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
		$about = $this->about->findOrFail($id);

		return View::make('admin.abouts.show', compact('about'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$about = $this->about->find($id);

		if (is_null($about))
		{
			return Redirect::route('admin.abouts.index');
		}

		return View::make('admin.abouts.edit', compact('about'));
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
		$validation = Validator::make($input, About::$rules);

		if ($validation->passes())
		{
			$about = $this->about->find($id);

			if (Input::hasFile('pictureN')) {
				$input['picture'] = $this->uploadPicture($input, "pictureN");
			}

			unset($input['pictureN']);

			$about->update($input);

			return Redirect::to('admin/abouts');
		}

		return Redirect::route('admin.abouts.edit', $id)
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
		$this->about->find($id)->delete();

		return Redirect::route('admin.abouts.index');
	}

	protected function uploadPicture($input, $name){
		if (Input::hasFile($name))
		{
			$name_file = 'picture_about.'.Input::file($name)->getClientOriginalExtension();
			$path = '/uploads/abouts/';
		    
		    Input::file($name)->move(public_path().$path, $name_file);

		    return $path.$name_file;
		}

		return $input[$name];
	}

}
