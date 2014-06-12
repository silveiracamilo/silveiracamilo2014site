<?php

class Admin_UsersController extends BaseController {

	/**
	 * User Repository
	 *
	 * @var User
	 */
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function login()
	{
		if ($this->isPostRequest()) {
			$validator = $this->getLoginValidator();

			if ($validator->passes()) {
				$credentials = $this->getLoginCredentials();

				if (Auth::attempt($credentials)) {
					return Redirect::to("admin/homes");
				}

				return Redirect::back()->withErrors([
					"password" => ["Credentials invalid."]
				]);
			} else {
				return Redirect::back()
				->withInput()
				->withErrors($validator);
			}
		}

		return View::make('admin.users.login');
	}

	protected function isPostRequest()
	{
		return Input::server("REQUEST_METHOD") == "POST";
	}

	protected function getLoginValidator()
	{
		return Validator::make(Input::all(), [
		  "username" => "required",
		  "password" => "required"
		]);
	}

	protected function getLoginCredentials()
	{
		return [
		  "username" => Input::get("username"),
		  "password" => Input::get("password")
		];
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::to("/admin/login");
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();

		return View::make('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$input['password'] = Hash::make($input['password']);

			$this->user->create($input);

			return Redirect::route('admin.users.index');
		}

		return Redirect::route('admin.users.create')
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
		$user = $this->user->findOrFail($id);

		return View::make('admin.users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('admin.users.index');
		}

		return View::make('admin.users.edit', compact('user'));
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
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$input['password'] = Hash::make($input['password']);

			$user = $this->user->find($id);
			$user->update($input);

			return Redirect::route('admin.users.show', $id);
		}

		return Redirect::route('admin.users.edit', $id)
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
		$this->user->find($id)->delete();

		return Redirect::route('admin.users.index');
	}

}
