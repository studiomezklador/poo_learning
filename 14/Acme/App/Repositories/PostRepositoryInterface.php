<?php

/*
CONTRACT:
Which kind of Method an App can expected when dealing with calsses implementing this interface
*/

namespace Acme\App\Repositories;

interface PostRepositoryInterface
{
	/**
	* Return all posts as an array of objects
	* $post->title
	* $post->body
	*
	* @return array
	*/

	public function All();

	/**
	* Return a single post
	* $post->title
	* $post->body
	*
	* @param   integer $id
	* @return array
	*/

	public function Find($id);

}