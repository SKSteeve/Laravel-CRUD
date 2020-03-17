@extends('layout.main')

@section('title', 'Списък студенти')

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
        <input type="text" class="form-control" id="name" name="formdata[name]" value="{{@$student['name']}}">
      </div>
      <div class="form-group col-md-4">
        <label for="lastName">Фамилия</label>
        <input type="text" class="form-control" id="lastName" name="formdata[lastName]"  value="{{@$student['lastName']}}">
      </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="EGN">ЕГН</label>
          <input type="number" class="form-control" id="EGN" name="formdata[EGN]"  value="{{@$student['EGN']}}">
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
          <input type="checkbox" id="football" name="formdata[sportPref][football]" @if(isset($student['sportPref']['football'])) checked @endif value="football">
          <label for="football">Футбол</label><br />
          <input type="checkbox" id="voleyball" name="formdata[sportPref][voleyball]" @if(isset($student['sportPref']['voleyball'])) checked @endif value="voleyball">
          <label for="voleyball">Волейбол</label><br />
          <input type="checkbox" id="swiming" name="formdata[sportPref][swiming]" @if(isset($student['sportPref']['swiming'])) checked @endif value="swiming">
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
        <textarea id="short-description" class="form-control" rows="3" placeholder="Опиши се (по желание)" name="formdata[descriptionText]">{{@$student['descriptionText']}}</textarea><br />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col">
            <a class="btn btn-primary" href="{{url('/items')}}">Ново търсене</a>
            <button class="btn btn-primary" type="submit" name="search" value="search">Търси</button>
        </div>

        <div class="form-group col-md-4">
            <select name="formdata[searchGroup]" id="searchGroup" class="form-control text-white bg-dark">
                @foreach($searchGroup as $key => $val)
                  <option value="{{$key}}" @if($key == @$student['searchGroup']) selected @endif >{{$val}}</option>
                @endforeach
            </select>
        </div>
    </div>

  </form>
</div>
@endsection

@section('table')
    tablica
@endsection