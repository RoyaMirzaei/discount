<div class="container">
    <div class="row">
        @if(session()->has('message'))
            <section class="col-6 offset-3 alert alert-danger">
                <h5 class="text-danger text-center" dir="rtl">
                    {{session('message')}}
                </h5>
            </section>
        @endif
        <section class="col-12 offset-0">
            <button wire:click="create()" class="btn btn-success">افرودن+</button>
            @if($isOpen)
                @include('livewire.admin.category.create')
            @endif
        </section>
    </div>
    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead class="table table-info">
            <tr>
                <th class="px-4 py-2 w-20">ردیف</th>
                <th class="px-4 py-2">عنوان</th>
                <th class="px-4 py-2">نوع</th>
                <th class="px-4 py-2">توضیحات</th>
                <th class="px-4 py-2">تصویر</th>
                <th class="px-4 py-2">وضعیت</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //                                    dd($categories);
            ?>
            @foreach($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->id }}</td>
                    <td class="border px-4 py-2">{{ $category->title }}</td>
                    <td class="border px-4 py-2">{{ $category->slug }}</td>
                    <td class="border px-4 py-2">{{ $category->summary }}</td>
                    <td class="border px-4 py-2">{{ $category->photo }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $category->id }})"
                                class="btn btn-info ">
                            ویرایش
                        </button>
                        <button wire:click="delete({{ $category->id }})"
                                class="btn  btn-danger ">
                            حذف
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
</div>
