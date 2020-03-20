@extends('layout.main')

@section('title', 'Нов студент')

@section('form')
<div class="mx-auto" style="width: 900px;">
  <form method="POST">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="ID">ID</label>
        <input type="number" class="form-control" id="ID" name="formdata[id]" value="{{@$student['id']}}">
      </div>
      <div class="form-group col-md-4">
        <label for="name">Име</label>
        <input type="text" class="form-control" id="name"  name="formdata[name]" value="{{@$student['name']}}">
      </div>
      <div class="form-group col-md-4">
        <label for="lastName">Фамилия</label>
        <input type="text" class="form-control" id="lastName" name="formdata[last_name]"  value="{{@$student['last_name']}}">
      </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="EGN">ЕГН</label>
          <input type="number" class="form-control" id="EGN" name="formdata[egn]"  value="{{@$student['egn']}}">
        </div>
        <div class="form-group col-md-4">
          <label for="email">Имейл</label>
          <input type="email" class="form-control" id="email" name="formdata[email]"  value="{{@$student['email']}}">
        </div>
        <div class="form-group col-md-4">
          <label for="city">Град</label>
          <input type="text" class="form-control" id="city" name="formdata[city]"  value="{{@$student['city']}}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <p>Пол:</p>
          <input type="radio" id="male" name="formdata[gender]" @if(@$student['gender'] == 'Мъж') checked @endif value="Мъж">
          <label for="male">Мъж</label><br />
          <input type="radio" id="fmale" name="formdata[gender]" @if(@$student['gender'] == 'Жена') checked @endif value="Жена">
          <label for="fmale">Жена</label>
        </div>
        <div class="form-group col-md-4">
          <p>Предпочитани спортове:</p>
          <input type="checkbox" id="football" name="formdata[sport_preff][football]" @if(isset($student['sport_preff']['football']) || strpos($student['sport_preff'], 'football') !== false) checked @endif value="football">
          <label for="football">Футбол</label><br />
          <input type="checkbox" id="voleyball" name="formdata[sport_preff][voleyball]" @if(isset($student['sport_preff']['voleyball']) || strpos($student['sport_preff'], 'voleyball') !== false) checked @endif value="voleyball">
          <label for="voleyball">Волейбол</label><br />
          <input type="checkbox" id="swiming" name="formdata[sport_preff][swiming]" @if(isset($student['sport_preff']['swiming']) || strpos($student['sport_preff'], 'swiming') !== false) checked @endif value="swiming">
          <label for="swiming">Плуване</label>
        </div>
        <div class="form-group col-md-4">
            <label for="subj-matter">Избираем предмет:</label>
            <select name="formdata[subject]" id="subj-matter" class="form-control">
              @foreach($subject as $key => $val)
                <option value="{{$key}}" @if($key == @$student['subject']) selected @endif >{{$val}}</option>
              @endforeach
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="short-description">Кратко описание</label><br />
            <textarea id="short-description" class="form-control" rows="3" placeholder="Опиши се (по желание)" name="formdata[description_text]">{{@$student['description_text']}}</textarea><br />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col">
            <a class="btn btn-primary" href="{{url('/item')}}">Изчисти</a>
            <a class="btn btn-danger" href="{{url('/items')}}">Отказ</a>
            <button class="btn btn-primary" type="submit" name="save" value="save">Запиши</button>
        </div>
    </div>

  </form>
</div>
@endsection