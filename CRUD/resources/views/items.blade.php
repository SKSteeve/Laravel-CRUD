@extends('layout.main')

@section('title', 'Списък студенти')

@section('form')
<div class="mx-auto" style="width: 900px;">
  <form>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="ID">ID</label>
        <input type="number" class="form-control" id="ID" name="id">
      </div>
      <div class="form-group col-md-4">
        <label for="name">Име</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group col-md-4">
        <label for="lastName">Фамилия</label>
        <input type="text" class="form-control" id="lastName" name="lastName">
      </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="EGN">ЕГН</label>
          <input type="number" class="form-control" id="EGN" name="EGN">
        </div>
        <div class="form-group col-md-4">
          <label for="email">Имейл</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group col-md-4">
          <label for="city">Град</label>
          <input type="text" class="form-control" id="city" name="city">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <p>Пол:</p>
          <input type="radio" id="male" name="gender" value="Мъж">
          <label for="male">Мъж</label><br />
          <input type="radio" id="fmale" name="gender" value="Жена">
          <label for="fmale">Жена</label>
        </div>
        <div class="form-group col-md-4">
          <p>Предпочитани спортове:</p>
          <input type="checkbox" id="football" name="sport" value="football">
          <label for="football">Футбол</label><br />
          <input type="checkbox" id="voleyball" name="sport" value="voleyball">
          <label for="voleyball">Волейбол</label><br />
          <input type="checkbox" id="swiming" name="sport" value="swiming">
          <label for="swiming">Плуване</label>
        </div>
        <div class="form-group col-md-4">
            <label for="subj-matter">Избираем предмет:</label>
            <select name="subject" id="subj-matter" class="form-control">
                <option value="Биоинженерство">Биоинженерство (по подразбиране)</option>
                <option value="Биоинформатика">Биоинформатика</option>
                <option value="Биохимия">Биохимия</option>
                <option value="Екология">Екология</option>
            </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="short-description">Кратко описание</label><br />
            <textarea name="descriptionText" id="short-description" class="form-control" rows="3" placeholder="Опиши се (по желание)"></textarea><br />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col">
            <a class="btn btn-primary" href="{{url('/items')}}">Ново търсене</a>
            <a class="btn btn-primary" href="{{url('/items')}}">Търси</a>
        </div>

        <div class="form-group col-md-4">
            <select name="searchGroup" id="searchGroup" class="form-control text-white bg-dark">
                <option value="all">Покажи Всички</option>
                <option value="notTrashed">Неизтрити</option>
                <option value="trashed">Изтрити</option>
            </select>
        </div>
    </div>

  </form>
</div>
@endsection

@section('table')
    tablica
@endsection