<?php

namespace Acme\App\Repositories;

class PostJsonRepository implements PostRepositoryInterface {

	protected $posts = [];

	public function __construct()
	{
		$posts = json_decode(file_get_contents(dirname(__FILE__) . '/posts.json'), true);
		foreach ($posts as $key => $post) { // convert json_decode array to an array of objects
			$this->posts[$key] = (object) $post;
		}
	}

	public function All()
	{
		return $this->posts;
	}

	public function Find($id)
	{
		return isset($this->posts[$id]) ? $this->posts[$id] : [];
	}
}