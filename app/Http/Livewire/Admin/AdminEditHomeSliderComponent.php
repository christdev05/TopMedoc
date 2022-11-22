<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $description;
    public $text;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slide_id)
    {
        $slider = HomeSlider::find($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->description = $slider->description;
        $this->text = $slider->text;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }

    public function updateSlide()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->text = $this->text;
        $slider->description = $this->description;
        if ($this->newimage)
        {
            $imagename = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAs('slider',$imagename);
            $slider->image = $imagename;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been updated successfuly!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component');
    }
}
