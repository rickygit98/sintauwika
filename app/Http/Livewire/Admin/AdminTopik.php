<?php


namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Topik;
use App\Models\Skripsi;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTopik extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id_topik;
    public $title;
    public $mahasiswa;
    public $pembimbing;
    public $comment;

    public function render()
    {
        $topik = Topik::all();

        return view('/admin/topik/index',[
            'topik' => $topik,
        ])
        ->extends('layouts.adminmain')
        ->section('content');
    }

    public function showTopik($id){
        $topik = Topik::where('id','=',$id)->first();
        $this->id_topik = $topik->id;
        $this->title = $topik->title;
        $this->mahasiswa = $topik->mahasiswa->user->name;
        $this->pembimbing = $topik->dosen->user->name;
        $this->comment = $topik->comment;
    }
}
