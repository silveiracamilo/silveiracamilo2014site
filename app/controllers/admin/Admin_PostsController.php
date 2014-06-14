<?php
class Admin_PostsController extends \BaseController {

	/**
	 * Post Repository
	 *
	 * @var Post
	 */
	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->all();

		return View::make('admin.posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
			$input['image'] = $this->uploadImage($input, 'image');
			
			$this->post->create($input);

			return Redirect::route('admin.posts.index');
		}

		return Redirect::route('admin.posts.create')
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
		$post = $this->post->findOrFail($id);

		return View::make('admin.posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->find($id);

		if (is_null($post))
		{
			return Redirect::route('admin.posts.index');
		}

		return View::make('admin.posts.edit', compact('post'));
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
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
			
			$post = $this->post->find($id);

			if (Input::hasFile('imageN')) {
				$input['image'] = $this->uploadImage($input, 'imageN');
				
				if($post->image!=null) $this->deleteFile($post->image);			
			}

			unset($input['imageN']);

			$post->update($input);

			return Redirect::route('admin.posts.show', $id);
		}

		return Redirect::route('admin.posts.edit', $id)
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
		$post = $this->post->find($id);

		$this->deleteFile($post->image);

		$post->delete();

		return Redirect::route('admin.posts.index');
	}

	protected function uploadImage($input, $name){
		if (Input::hasFile($name))
		{
			$name_file = Help::getNewName(Input::file($name)->getClientOriginalExtension());
			$path = '/uploads/posts/';
		    
		    Input::file($name)->move(public_path().$path, $name_file);

		    return $path.$name_file;
		}

		return $input[$name];
	}

	protected function deleteFile($file_path){
		File::delete(public_path().$file_path);
	}

}
