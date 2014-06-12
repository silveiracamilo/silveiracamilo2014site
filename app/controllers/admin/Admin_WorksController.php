<?php

class Admin_WorksController extends Admin_BaseController {

	/**
	 * Work Repository
	 *
	 * @var Work
	 */
	protected $work;

	public function __construct(Work $work)
	{
		$this->work = $work;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$works = $this->work->all();

		return View::make('admin.works.index', compact('works'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$selectWorkTypes = $this->getSelectWorkTypes();

		return View::make('admin.works.create', compact('selectWorkTypes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Work::$rules);

		if ($validation->passes())
		{
			$this->work->create($input);

			return Redirect::route('admin.works.index');
		}

		return Redirect::route('admin.works.create')
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
		$work = $this->work->findOrFail($id);

		return View::make('admin.works.show', compact('work'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work = $this->work->find($id);

		if (is_null($work))
		{
			return Redirect::route('admin.works.index');
		}

		$selectWorkTypes = $this->getSelectWorkTypes();

		return View::make('admin.works.edit', compact('work', 'selectWorkTypes'));
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
		$validation = Validator::make($input, Work::$rules);

		if ($validation->passes())
		{
			$work = $this->work->find($id);
			$work->update($input);

			return Redirect::route('admin.works.show', $id);
		}

		return Redirect::route('admin.works.edit', $id)
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
		$this->work->find($id)->delete();

		return Redirect::route('admin.works.index');
	}

	protected function getSelectWorkTypes(){
		$work_types = Work_type::all();
		$selectWorkTypes = array();

		foreach($work_types as $work_type) {
		    $selectWorkTypes[$work_type->id] = $work_type->name;
		}

		return $selectWorkTypes;
	}

}
