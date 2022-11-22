<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $description;
    public $text;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function addSlide()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->description = $this->description;
        $slider->text = $this->text;
        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('slider',$imagename);
        $slider->image = $imagename;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been created successfuly!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.app');
    }
}
