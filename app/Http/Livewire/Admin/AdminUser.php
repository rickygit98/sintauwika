<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUser extends Component
{

    use WithPagination;

    public $id_user;
    public $name;
    public $role_id;
    public $username;
    public $contact;
    public $email;
    public $password;
    public $id_num;


    public function resetInputFields(){
        $this->name = '';
        $this->role_id = '';
        $this->username = '';
        $this->contact = '';
        $this->email = '';
        $this->password = '';
        $this->id_num = '';

    }

    public function addUser(){

        $validatedData = $this->validate([
            'name' => 'required',
            'role_id' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_num' => 'required'
        ]);
        
        $user = User::create($validatedData);

        $insertedId = $user->id;

        $getrole = $user->role_id;
        if($getrole == 1){
            $admin = new Admin();
            $admin->user_id = $insertedId;
            $admin->id_num = $validatedData['id_num'];
            $admin->save();
        }
        else if($getrole == 2){
            $dosen = new Dosen();
            $dosen->user_id = $insertedId;
            $dosen->nip = $validatedData['id_num'];
            $dosen->save();
        }
        else if($getrole == 3){
            $mahasiswa = new Mahasiswa();
            $mahasiswa->user_id = $insertedId;
            $mahasiswa->nrp = $validatedData['id_num'];
            $mahasiswa->save();
        }

        session()->flash('success','User berhasil ditambahkan');

        $this->resetInputFields();
        
        $this->dispatchBrowserEvent('UserAdded');

        $this->emit('UserAdded');

        
    }

    public function showUser($id_user){

        $user = User::find($id_user);
        $this->id_user = $user->id;
        $this->name = $user->name;
        $this->role_id = $user->role_id;
        $this->username = $user->username;
        $this->contact = $user->contact;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function updateUser(){
        $validatedData = $this->validate([
            'name' => 'required',
            'role_id' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_num' => 'required'
        ]);
        if ($this->id_user) {
            $user = User::find($this->id_user)->update([
                'name' => $this->name,
                'role_id' => $this->role_id,
                'username' => $this->username,
                'contact' => $this->contact,
                'email' => $this->email,
                'password' => $this->password,
            ]);
        }

        session()->flash('success','User berhasil diupdate');

        $this->resetInputFields();
        
        $this->dispatchBrowserEvent('userUpdated');

        $this->emit('userUpdated');

    
    }

    public function deleteUser($id_user){
        $this->id_user = $id_user;
        User::find($this->id_user)->delete();

        session()->flash('success','User berhasil di delete');

    }
    public function render()
    {
        $users = User::orderBy('id','DESC')
        // nyalakan ini jika butuh untuk mahasiswa saja, dosen saja atau admin saja 1 = Admin , 2 = Dosen , 3 = Mahasiswa
        // ->whereIn('role_id',[3]) 
        ->get();

        return view('livewire.adminUser',[
            'users'=> $users,
        ])
        ->extends('layouts.adminmain')
        ->section('content');
    }
}
