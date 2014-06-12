<?php

class Admin_Work_typesController extends BaseController {

	/**
	 * Work_type Repository
	 *
	 * @var Work_type
	 */
	protected $work_type;

	public function __construct(Work_type $work_type)
	{
		$this->work_type = $work_type;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$work_types = $this->work_type->all();

		return View::make('admin.work_types.index', compact('work_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.work_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Work_type::$rules);

		if ($validation->passes())
		{
			$this->work_type->create($input);

			return Redirect::route('admin.work_types.index');
		}

		return Redirect::route('admin.work_types.create')
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
		$work_type = $this->work_type->findOrFail($id);

		return View::make('admin.work_types.show', compact('work_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work_type = $this->work_type->find($id);

		if (is_null($work_type))
		{
			return Redirect::route('admin.work_types.index');
		}

		return View::make('admin.work_types.edit', compact('work_type'));
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
		$validation = Validator::make($input, Work_type::$rules);

		if ($validation->passes())
		{
			$work_type = $this->work_type->find($id);
			$work_type->update($input);

			return Redirect::route('admin.work_types.show', $id);
		}

		return Redirect::route('admin.work_types.edit', $id)
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
		$this->work_type->find($id)->delete();

		return Redirect::route('admin.work_types.index');
	}

}
