@extends('layout.main')

@section('title', 'Списък студенти')

@section('form')
<div class="mx-auto" style="width: 900px;">
  <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="ID">ID</label>
        <input type="number" class="form-control" id="ID" name="formdata[id]">
      </div>
      <div class="form-group col-md-4">
        <label for="name">Име</label>
        <input type="text" class="form-control" id="name" name="formdata[name]">
      </div>
      <div class="form-group col-md-4">
        <label for="lastName">Фамилия</label>
        <input type="text" class="form-control" id="lastName" name="formdata[last_name]">
      </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="EGN">ЕГН</label>
          <input type="number" class="form-control" id="EGN" name="formdata[egn]">
        </div>
        <div class="form-group col-md-4">
          <label for="email">Имейл</label>
          <input type="email" class="form-control" id="email" name="formdata[email]">
        </div>
        <div class="form-group col-md-4">
          <label for="city">Град</label>
          <input type="text" class="form-control" id="city" name="formdata[city]">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <p>Пол:</p>
          <input type="radio" id="male" name="formdata[gender]" value="Мъж">
          <label for="male">Мъж</label><br />
          <input type="radio" id="fmale" name="formdata[gender]" value="Жена">
          <label for="fmale">Жена</label>
        </div>
        <div class="form-group col-md-4">
          <p>Предпочитани спортове:</p>
          <input type="checkbox" id="football" name="formdata[sport_preff][football]" value="football">
          <label for="football">Футбол</label><br />
          <input type="checkbox" id="voleyball" name="formdata[sport_preff][voleyball]" value="voleyball">
          <label for="voleyball">Волейбол</label><br />
          <input type="checkbox" id="swiming" name="formdata[sport_preff][swiming]" value="swiming">
          <label for="swiming">Плуване</label>
        </div>
        <div class="form-group col-md-4">
            <label for="subj-matter">Избираем предмет:</label>
            <select name="formdata[subject]" id="subj-matter" class="form-control">
              <option value="0">-</option>
              <option value="1">Биоинформатика</option>
              <option value="2">Биохимия</option>
              <option value="3">Екология</option>
              <option value="4">Биоинженерство</option>
            </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="short-description">Кратко описание</label><br />
        <textarea id="short-description" class="form-control" rows="3" placeholder="Търсене по ключова дума/и от описанието на студент." name="formdata[description_text]"></textarea><br />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col">
            <a class="newSearching btn btn-primary" href="{{url('/items')}}">Изчисти формуляра</a>
            <button id="searchBtn" class="btn btn-primary" type="submit" name="search">Търси</button>
        </div>

        <div class="form-group col-md-4">
            <select name="formdata[searchGroup]" id="searchGroup" class="form-control text-white bg-dark">
                <option value="0">Покажи Всички</option>
                <option value="1">Неизтрити</option>
                <option value="2">Изтрити</option>
            </select>
        </div>
    </div>
    <input type="hidden" value="{{url('/')}}" id="url" name="url">
  </form>
</div>
<br /><br />
<br /><br />
@endsection

@section('table')
<div class="mx-auto" style="width: 1300px;">

  {{-- using both ajax and session to get message for delete and reset --}}
  <div class="ajaxMessage"></div>

  @if(session('message'))
    <div class="ajaxMessageSession alert alert-{{session()->get('messageStatus')}}" role="alert">{{session()->get('message')}}</div><br />
  @endif

  <table class="table table-hover table-sm table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th class="text-danger">ID</th>
        <th>Име</th>
        <th>Фамилия</th>
        <th>ЕГН</th>
        <th>Имейл</th>
        <th>Град</th>
        <th>Пол</th>
        <th>Пр.спорт</th>
        <th>Изб.предмет</th>
        <th>Описание</th>

        <th>Редактиране</th>
        <th>Изтриване</th>
      </tr>
    </thead>
    <tbody>
        {{-- ajax table data here from itemsAjax.js --}}
    </tbody>
  </table>
</div>
@endsection

@section('js')
  <script src="{{ asset('js/itemsAjax.js') }}"></script>
@endsection