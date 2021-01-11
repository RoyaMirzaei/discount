<div class="card">
    <h5 class="card-header">افزودن دسته بندی</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="inputTitle" class="col-form-label">عنوان <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="title" placeholder="Enter title" wire:model="title"  class="form-control">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputTitle" class="col-form-label">گروه بندی <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="slug" placeholder="Enter title"  wire:model="slug"  class="form-control">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="summary" class="col-form-label">توضیحات</label>
                <textarea class="form-control" id="summary" name="summary" wire:model="summary"></textarea>
                @error('summary')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">تصویر</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="photo">
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control" wire:model="status">
                    <option disabled selected>وضعیت </option>
                    <option value="1">فعال</option>
                    <option value="0" >غیر فعال</option>
                </select>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <button wire:click="closeModal()" type="button" class="btn btn-warning"> خروج </button>
                <button wire:click.prevent="store()" type="button" class="btn btn-success" >ذخیره</button>
            </div>
        </form>
    </div>
</div>
