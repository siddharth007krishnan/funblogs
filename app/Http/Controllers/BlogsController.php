<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //
	public function index () {
		$blogs = \App\Blog::all();
		return view ('blogs.index')->with('blogs' , $blogs);
	}
	
	
	public function show (int $id) {
		$blog = \App\Blog::findOrFail($id);
		return view ('blogs.show')->with('blog' , $blog);
	}
	
	public function create () {
		//returns a form view
		return view ('blogs.create');
	}
	
	public function store(Request $request) {
		//takes request from the form to save the details in through the database
		$rules = [
			'title' => 'required',
			'content' => 'required',
		];
		$request->validate($rules);
		$blog = new \App\Blog();
		$blog->title = $request->input('title');
		$blog->content = $request->input('content');
		$blog->save();	
		return redirect('/blogs');
	}
	
	public function edit(int $id) {
		$blog = \App\Blog::findOrFail($id);
		return view ('blogs.edit')->with('blog' , $blog);
	}
	
	public function update (Request $request , int $id) {	
		//updates the existing record in the database identified by the @param:id
		//$request contains the the data to be updated in to the database in form of a HTTP post request
		$rules = [
			'title' => 'required' , 
			'content' => 'required',
		];
		$blog = \App\Blog::findOrFail($id);
		$blog->title = $request->input('title');
		$blog->content = $request->input('content');
		$blog->save();
		return redirect('blogs');
	}
	
	public function destroy (int $id) {	
		$blog = \App\Blog::findOrFail($id);
		$blog->delete();
		return redirect('blogs');
	}
}
