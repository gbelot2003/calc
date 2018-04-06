<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usersrequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
        $this->middleware( 'statusCheck' );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return View('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Usersrequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Usersrequest $request)
    {
        $user = User::create($request->all());
        flash('Registro completado.')->success();
        return redirect()->to('/admin/user ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return View('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Usersrequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Usersrequest $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;
        $user->update($request->all());

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/user ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
