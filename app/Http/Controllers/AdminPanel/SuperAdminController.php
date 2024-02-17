<?php

namespace App\Http\Controllers\AdminPanel;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        $user =DB::table('users')
                ->where('deleted', 'No')
                ->orderBy('id')
                ->Paginate(5);

        return view('AdminPanel.index', ['users' => $user]);
    }
    
    public function create()
    {
        return view('AdminPanel.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name'  => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);
        $user = DB::table('users')->insert(
            [
                'name'      => $req->name,
                'email'     => $req->email,
                'role'      => $req->role,
                'password'  => bcrypt('password'),
            ]
        );
        flash()->addSuccess('User Create Successfully.');
        return redirect()->route('Users');
    }

    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        //return $user;
        return view('AdminPanel.edit', ['user' => $user]);
    }

    public function update(Request $req, string $id)
    {
        $req->validate([
            'name'  => 'required',
            'email' => 'required | email',
        ]);

        DB::table('users')
        ->where('id', $id)
        ->update([
            'name'      => $req->name,
            'email'     => $req->email,
            'role'      => $req->role,
            'status'    => $req->status,
        ]);
        flash()->addSuccess('User Update Successfully.'); 
        return redirect()->route('Users');
    }

    public function trash(string $id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update([
            'status'  => 'Inactive',
            'deleted' => 'Yes',
        ]);
        flash()->addWarning('This account are Inactive.'); 
        return redirect()->route('Users');
    }

    public function trashUsers()
    {
        $user =DB::table('users')
                ->where('deleted_at', Null)
                ->where('deleted', 'Yes')
                ->orderBy('id')
                ->Paginate(5);

        return view('AdminPanel.trash', ['users' => $user]);
    }

    public function restore(string $id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update([
            'status'  => 'Active',
            'deleted' => 'No',
        ]);
        flash()->addWarning('This account are Active.');  
        return redirect()->route('Trashlist');
    }

    public function destroy(string $id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update([
            'status'  => 'Inactive',
            'deleted_at' => Now(),
        ]);
        flash()->addInfo('Your account is Deleted.');  
        return redirect()->route('Trashlist');
    }

}
