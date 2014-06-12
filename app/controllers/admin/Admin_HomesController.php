<?php

class Admin_HomesController extends \BaseController {

	/**
	 * Home Repository
	 *
	 * @var Home
	 */
	protected $home;

	public function __construct(Home $home)
	{
		$this->home = $home;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$homes = $this->home->all();

		return View::make('admin.homes.index', compact('homes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.homes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Home::$rules);

		if ($validation->passes())
		{
			$this->home->create($input);

			return Redirect::route('admin.homes.index');
		}

		return Redirect::route('admin.homes.create')
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
		$home = $this->home->findOrFail($id);

		return View::make('admin.homes.show', compact('home'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$home = $this->home->find($id);

		if (is_null($home))
		{
			return Redirect::route('admin.homes.index');
		}

		return View::make('admin.homes.edit', compact('home'));
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
		$validation = Validator::make($input, Home::$rules);

		if ($validation->passes())
		{
			$home = $this->home->find($id);
			$home->update($input);

			return Redirect::route('admin.homes.show', $id);
		}

		return Redirect::route('admin.homes.edit', $id)
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
		$this->home->find($id)->delete();

		return Redirect::route('admin.homes.index');
	}

}
