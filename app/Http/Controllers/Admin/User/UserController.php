<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\Admin\Admin;
use App\Models\UserModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\EditForm;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserModel::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $user = UserModel::find(base64_decode($id));

        return $user ? view('admin.users.edit', compact('user')) :
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\User\EditForm $request
     * @param string $id
     * @return void
     */
    public function update(EditForm $request, string $id)
    {
        return Admin::userUpdate()->run($request, $id) ?
            redirect(route('admin.users.edit', compact('id')))
            ->with('editMessage', 'Данные успешно обновлены!') :
            redirect(route('admin.users.edit', compact('id')))
            ->with('notData', 'Нет данных для обновления!');
    }
}
