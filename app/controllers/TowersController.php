<?php

class TowersController extends \BaseController {

	/**
	 * Display a listing of towers
	 *
	 * @return Response
	 */
	public function index()
	{
		$towers = Tower::all();

		return View::make('towers.index', compact('towers'));
	}

	/**
	 * Show the form for creating a new tower
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('towers.create');
	}

	/**
	 * Store a newly created tower in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tower::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Tower::create($data);

		return Redirect::route('towers.index');
	}

	/**
	 * Display the specified tower.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tower = Tower::findOrFail($id);

		return View::make('towers.show', compact('tower'));
	}

	/**
	 * Show the form for editing the specified tower.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tower = Tower::find($id);

		return View::make('towers.edit', compact('tower'));
	}

	/**
	 * Update the specified tower in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tower = Tower::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tower::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tower->update($data);

		return Redirect::route('towers.index');
	}

	/**
	 * Remove the specified tower from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tower::destroy($id);

		return Redirect::route('towers.index');
	}

}
