<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithFileUploads;

    public $categories, $title, $slug, $summary, $image, $status;
    public $isOpen = 0;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.categories')->layout('layouts.base');
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }


    private function resetInputFields()
    {
        $this->title = '';
        $this->slug = '';
        $this->summary = '';
        $this->status = '';
        $this->image = '';
        $this->id = '';
    }


    protected $rules = [
        'title' => ['required'],
        'slug' => ['required'],
        'summary' => ['required'],
        'image' => ['required', 'max:1000', 'mimes:jpg,jpeg,png'],
        'status' => ['required'],
    ];
    protected $messages = [
        'title.required' => 'عنوان الزامی می باشد .',
        'slug.required' => 'نوع دسته بندی الزامی می باشد. ',
        'summary.required' => 'توضیحات الزامی می باشد. ',
        'image.required' => 'وارد کردن تصویر الزامی می باشد.',
        'image.mimes' => 'فایل باید از نوع jpg,jpeg,png باشد. ',
        'image.max' => 'حجم تصویر نباید بیشتر از 1 مگابایت باشد.',
        'status.required' => 'وضعیت الزامی می باشد .',
    ];

    public function store()
    {

//        dd($this->photo->filename);
        $this->validate();
        $filename = $this->image->store('categoriesPic','public');
        $validatedData['image'] = $filename;

        Category::updateOrCreate(['id' => $this->id], [
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'status' => $this->status,
            'image' => $this->image,
        ]);

        session()->flash('message',
            $this->id ? 'ویرایش دسته بندی محصولات بدرستی انجام شد.' : 'دسته بندی جدید افزوده شد.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
//        $this->validate();
        $category = Category::findOrFail($id);
        $file = $this->file('image');
        if (!empty($file)) {
            $deleteImage = $category->photo;
            unlink('photos/category/' . $deleteImage);
            $filename = $this->image->store('categoriesPic',
                $this->image->getClintOriginalName(), 'public'
            );
            $validatedData['image'] = $filename;
            $this->photo = $filename;
        }
        $this->id = $id;
        $this->title = $category->title;
        $this->slug = $category->slug;
        $this->summary = $category->summary;
        $this->status = $category->status;


        $this->openModal();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'دسته بندی محصول حذف شد.');
    }
}
