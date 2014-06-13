<?php

class Admin_ServicesController extends Admin_BaseController {

	/**
	 * Service Repository
	 *
	 * @var Service
	 */
	protected $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = $this->service->all();

		return View::make('admin.services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.services.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Service::$rules);

		if ($validation->passes())
		{			
			$input['image'] = $this->uploadImage($input);

			$this->service->create($input);

			return Redirect::route('admin.services.index');
		}

		return Redirect::route('admin.services.create')
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
		$service = $this->service->findOrFail($id);

		return View::make('admin.services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = $this->service->find($id);

		if (is_null($service))
		{
			return Redirect::route('admin.services.index');
		}

		return View::make('admin.services.edit', compact('service'));
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
		$validation = Validator::make($input, Service::$rules);

		if ($validation->passes())
		{
			$oldNameImage = $input['image'];
			$input['image'] = $this->uploadImage($input);

			$service = $this->service->find($id);

			if($oldNameImage!=$input['image']) {
				File::delete(public_path().$service->image);
			}

			$service->update($input);

			return Redirect::route('admin.services.show', $id);
		}

		return Redirect::route('admin.services.edit', $id)
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
		$service = $this->service->find($id);

		File::delete(public_path().$service->image);

		$service->delete();

		return Redirect::route('admin.services.index');
	}

	protected function uploadImage($input){
		$name = 'image';
		if (Input::hasFile($name))
		{
			$name_file = Help::getNewName(Input::file($name)->getClientOriginalExtension());
			$path = '/uploads/services/';
		    
		    Input::file($name)->move(public_path().$path, $name_file);

		    return $path.$name_file;
		}

		return $input[$name];
	}

}
