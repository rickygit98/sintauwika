<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMahasiswa extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
   
    //menangkap event yang dikirimkan dari javascript
    protected $listeners = [
        //saat ada emit mengirimkan key deleteConfirmed , jalankan method deleteMahasiswa
        'deleteConfirmed' => 'deleteMahasiswa'
    ];

    public $id_user;
    public $name;
    public $role_id = 3;
    public $username;
    public $contact='+62';
    public $email;
    public $password;
    public $nrp;
    public $keyword;


    public function render()
    {

        $users = User::where('role_id',3)
        ->where(function ($query) {
            $query->where('name', 'LIKE', '%'.$this->keyword.'%')
                  ->orWhere('email', 'LIKE','%'.$this->keyword.'%')
                  ->orWhere('contact', 'LIKE','%'.$this->keyword.'%');
        })
        ->orderBy('id','DESC')
        ->paginate(10);

        return view('admin.mahasiswa.index',[
            'users'=> $users,
        ])
        ->extends('layouts.adminmain')
        ->section('content');
    }
    
    public function resetInputFields(){
        $this->name = '';
        $this->username = '';
        $this->contact = '';
        $this->email = '';
        $this->password = '';
        $this->nrp = '';

    }

    public function showMahasiswa($id_user){

        $user = User::find($id_user);
        $mahasiswa = Mahasiswa::where('user_id',$user->id)->first();

        $this->id_user = $user->id;
        $this->name = $user->name;
        $this->role_id = $user->role_id;
        $this->username = $user->username;
        $this->contact = $user->contact;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->nrp = $mahasiswa->nrp;
    }

    public function storeMahasiswa(){

        $validatedData = $this->validate([
            'name' => 'required',
            'role_id' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'nrp' => 'required'
        ]);
        $validatedData['contact'] = str_replace('+','',$validatedData['contact']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $insertedId = $user->id;

        $mahasiswa = new Mahasiswa();
        $mahasiswa->user_id = $insertedId;
        $mahasiswa->nrp = $validatedData['nrp'];
        $mahasiswa->save();

        session()->flash('success','Mahasiswa berhasil ditambahkan');

        $this->resetInputFields();
        
        // ini untuk mengirimkan event ke browser , bisa menangkap 2 parameter yaitu ('namaEvent',['messages'=>'Mahasiswa Berhasil Ditambahkan'])
        
        $this->dispatchBrowserEvent('MhsAdded',['message'=>'Mahasiswa Berhasil Ditambahkan']);

    }


    public function updateMahasiswa(){
        //buat rules
        $rules = [
            'name' => 'required',
            'role_id' => 'required',
            'username' => 'required',
            'contact' =>'required',
            'nrp' =>'required',
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

        $mahasiswa = Mahasiswa::where('user_id',$this->id_user)->first();

        Mahasiswa::where('id','=',$mahasiswa->id)->update([
            'nrp'=> $validatedData['nrp'],
        ]);

        session()->flash('success','Mahasiswa berhasil diupdate');

        $this->resetInputFields();
        
        
        $this->dispatchBrowserEvent('MhsUpdated',['message'=>'Mahasiswa Berhasil Diupdate']);



    
    }

    public function deleteMahasiswa(){
        // $this->id_user = $id_user;
        // $user = User::find($this->id_user)->delete();
        // Mahasiswa::where('user_id','=',$this->id_user)->delete();

        // session()->flash('success','User berhasil di delete');
        
        $user = User::findOrFail($this->id_user);

        $user->delete();

        Mahasiswa::where('user_id','=',$this->id_user)->delete();
        
        $this->dispatchBrowserEvent('deleted');
    }
    
    public function deleteMahasiswaConfirm($id_user){
        $this->id_user = $id_user;
        $this->dispatchBrowserEvent('showDeleteConfirmation');
    }

}
