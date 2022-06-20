<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GlobalLogin extends Component
{
    public $name, $email, $password;
    public $course_id;
    public $url;

    public function mount()
    {
        $this->url = url()->full();
    }

    public function globalLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', "You have been successfully login.");
            return redirect()->to($this->url);
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'code' => Str::substr(Str::upper($this->name), 0, 2) . rand(000000, 999999),
            'slug' => Str::slug($this->name),
            'status' => 'disabled',
        ];

        $user = User::create($data);
        $user->assignRole('User');

        session()->flash('message', 'You have been successfully registered.');

        $this->resetInputFields();
        // return redirect()->to('Courses');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }


    public function render()
    {
        return view('livewire.global-login');
    }
}
