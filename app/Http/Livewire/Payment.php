<?php

namespace App\Http\Livewire;

use App\Models\{Course, CourseUser};
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;



class Payment extends Cart
{

    public $course_id;
    public $course;

    public function enrollNow($course_id)
    {
        $agent = new Agent();

        // dd($agent->browser());
        $this->course = Course::withCount('students', 'lessons')->with('teacher:id,name,image,slug,email,code,designation')->where('id', $course_id)->first();
    }


    // public function storeEnrollment()
    // {
    //     if (!Auth::check()) {
    //         return   $this->dispatchBrowserEvent('loginModal');
    //     }

    //     if (count(CourseUser::where(['course_id' => $this->course_id, 'user_id' => auth()->user()->id])->get()) > 0) {
    //         return  session()->flash('error', "You have been enrolled to this course" . $this->course->name);
    //     }
    //     CourseUser::create(['course_id' => $this->course_id, 'user_id' => auth()->user()->id]);
    //     session()->flash('success', "You have successfully enrolled to this course" . $this->course->name);
    //     $this->dispatchBrowserEvent('closeModal');
    // }

    public function render()
    {
        return view('livewire.payment');
    }
}
