@php
    /** @var \App\Models\BlogCategory $item    */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a style="text-align: center" class="btn btn-outline-dark" href="{{route('blog.admin.categories.index')}}">Назад</a>
                    <i class="fab fa-avianex"></i>
                </nav>
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-item active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{$item->title}}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                            minlength="3"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="title">Идентификатор</label>
                            <input name="slug" value="{{$item->title}}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select name="parent_id"
                                    id="parent_id"
                                    class="form-control"
                            placeholder="Выбирете категорию"
                                    required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{$categoryOption->id}}"
                                                @if($categoryOption->id == $item->parent_id) selected @endif>
                                         {{-- {{$categoryOption->id}}. {{$categoryOption->title}} --}}
                                            {{ $categoryOption->id_title }}
                                        </option>
                            @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Введите описание"> {{old('descrepption', $item->description)}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
