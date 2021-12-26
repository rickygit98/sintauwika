<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDosen extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    //menangkap event yang dikirimkan dari javascript
    protected $listeners = [
        //saat ada emit mengirimkan key deleteConfirmed , jalankan method deleteMahasiswa
        'deleteConfirmed' => 'deleteDosen'
    ];

    public $id_user;
    public $name;
    public $role_id = 2;
    public $username;
    public $contact='+62';
    public $email;
    public $password;
    public $nip;
    public $keyword;

    public function resetInputFields(){
        $this->name = '';
        $this->username = '';
        $this->contact = '';
        $this->email = '';
        $this->password = '';
        $this->nip = '';

    }

    public function showDosen($id_user){

        $user = User::find($id_user);
        $dosen = Dosen::where('user_id',$user->id)->first();

        $this->id_user = $user->id;
        $this->name = $user->name;
        $this->role_id = $user->role_id;
        $this->username = $user->username;
        $this->contact = $user->contact;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->nip = $dosen->nip;
    }

    public function storeDosen(){

        $validatedData = $this->validate([
            'name' => 'required',
            'role_id' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'nip' => 'required'
        ]);
        $validatedData['contact'] = str_replace('+','',$validatedData['contact']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $insertedId = $user->id;

        $dosen = new Dosen();
        $dosen->user_id = $insertedId;
        $dosen->nip = $validatedData['nip'];
        $dosen->save();

        session()->flash('success','Dosen berhasil ditambahkan');

        $this->resetInputFields();
        
        $this->dispatchBrowserEvent('DsnAdded',['message'=>'Dosen Berhasil Ditambahkan']);
        
    }


    public function updateDosen(){
        //buat rules
        $rules = [
            'name' => 'required',
            'role_id' => 'required',
            'username' => 'required',
            'contact' =>'required',
            'nip' =>'required',
            'password' => 'required',
        ];
    
        //ambil data user dari database
        $user = User::find($this->id_user);
        
        //cek apakah email dari database sama dengan yang dikirim
        if ($this->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        } else {
            $rules['email'] = 'required';
        }
        
        //validasi rules nya
        $validatedData = $this->validate($rules);
        $validatedData['contact'] = str_replace('+','',$validatedData['contact']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        $user = User::find($this->id_user)->update([
            'name' => $validatedData['name'],
            'role_id' => $validatedData['role_id'],
            'username' => $validatedData['username'],
            'contact' =>$validatedData['contact'],
            'email' =>$validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        $dosen = Dosen::where('user_id',$this->id_user)->first();

        Dosen::where('id','=',$dosen->id)->update([
            'nip'=> $validatedData['nip'],
        ]);

        session()->flash('success','Dosen berhasil diupdate');

        $this->resetInputFields();
        
        $this->dispatchBrowserEvent('DsnUpdated',['message'=>'Dosen Berhasil diupdate']);


    
    }

    public function deleteDosen($id_user){
      
        $user = User::findOrFail($this->id_user);

        $user->delete();

        Dosen::where('user_id','=',$this->id_user)->delete();
        
        $this->dispatchBrowserEvent('deleted');

    }

    public function deleteDosenConfirm($id_user){
        $this->id_user = $id_user;
        $this->dispatchBrowserEvent('showDeleteConfirmation');
    }
    
    public function render()
    {
        $users = User::where('role_id',2)
        ->where(function ($query) {
            $query->where('name', 'LIKE', '%'.$this->keyword.'%')
                  ->orWhere('email', 'LIKE','%'.$this->keyword.'%')
                  ->orWhere('contact', 'LIKE','%'.$this->keyword.'%');
        })
        ->orderBy('id','DESC')
        ->paginate(10);

        return view('admin.dosen.index',[
            'users'=> $users,
        ])
        ->extends('layouts.adminmain')
        ->section('content');
    }

    
}
