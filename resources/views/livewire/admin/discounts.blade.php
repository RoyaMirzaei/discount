<div>
    @if(session()->has('message'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('message')}}
            </h5>
        </section>
    @endif
    <section class="col-12 offset-0">
        <button wire:click="create()" class="btn  btn-info">افرودن+</button>
                @if($isOpen)
                    @include('layouts.create')
                @endif
    </section>
    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead class="table table-info">
            <tr>
                {{--              'title','code','type_discount','type_value','value_fixed','value_percent','max_discount','count_user','count_discount','start_date','expiry_date','status'  --}}

                <td>#</td>
                <td>عنوان</td>
                <td>کد</td>
                <td>تعداد</td>
                <td>مبلغ</td>
                <td>درصد</td>
            </tr>
            </thead>

            <tbody>
            @foreach($d as $item)

                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>  {{$item->code}}</td>
                    <td> {{$item->count_discount}} </td>
                    <td> {{$item->value_fixed}} </td>
                    <td> {{$item->value_percent}} </td>
                    <td><a href="{{route('about.show',$item->id)}}" target="_blank" class="btn btn-success">show</a></td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $item->id }})" class="btn btn-danger">ویرایش</button>
                        {{--                        @if($isOpen)--}}
                        {{--                            @include('livewire.category.edit')--}}
                        {{--                        @endif/--}}
                        <button wire:click="delete({{ $item->id }})" class="btn  btn-info">حذف</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </section>
</div>


