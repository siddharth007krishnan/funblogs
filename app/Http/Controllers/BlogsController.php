<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Blog;

class BlogsController extends Controller
{
    //
	
	public function __construct() {
		$this->middleware('auth' , ['except' => ['index' , 'show']]);
	}
	
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
		$blog->user_id = Auth::user()->id;
		$blog->content = $request->input('content');
		$blog->save();	
		return redirect('/blogs')->with('success' , 'New Blog Post Created Successfully');
	}
	
	public function edit(int $id) {
		
		$blog = \App\Blog::findOrFail($id);
		if (Auth::user()->id != $blog->user->id) {
			return redirect ('/blogs')->with('warning' , 'Not allowed to edit  other user posts');
		}	
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
		if (Auth::user()->id != $blog->user->id) {
			return redirect('/blogs');
		}
		$blog->title = $request->input('title');
		$blog->content = $request->input('content');
		$blog->save();
		return redirect('/blogs')->with('success' , 'Update Successful');
	}
	
	public function destroy (int $id) {
		$blog = \App\Blog::findOrFail($id);
		if (Auth::user()->id != $blog->user->id) {
			return redirect('/blogs')->with('warning' , 'Cannot Delete Others Posts');
		}
		$blog->delete();
		return redirect('blogs')->with('warning' , 'Blog Post Deleted Successfully');
	}
}
