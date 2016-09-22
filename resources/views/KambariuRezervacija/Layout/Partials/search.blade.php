<div class="col-md-3 thumbnail" style="padding:5px;">
    <div class="my-slider">
      <ul>
        <li><p class="lead text-center">Vienvietis</p>
          <img src="Style/Images/Types/1.jpg" />
        </li>
        <li><p class="lead text-center">Dvivietis</p>
          <img src="Style/Images/Types/2.jpg" />
        </li>
        <li><p class="lead text-center">Trivietis</p>
          <img src="Style/Images/Types/3.jpg" />
        </li>
        <li><p class="lead text-center">Keturvietis</p>
        <img src="Style/Images/Types/4.jpg" />
        </li>
      </ul>
    </div>

    <hr />

   <form>
      <label for="exampleInputEmail1">Rezervacijos data</label>
      <div class="input-daterange input-group" id="datepicker">
          <input type="text" class="input-sm form-control" name="start" id="dpd1" />
          <span class="input-group-addon">iki</span>
          <input type="text" class="input-sm form-control" name="end" id="dpd2" />
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label for="exampleInputEmail1">Suaugusieji</label>
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="exampleInputEmail1">Vaikai</label>
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
        </div>
      </div>
    <label for="exampleInputEmail1">Kaina</label>
        <div class="input-daterange input-group">
            <input type="number" class="input-sm form-control" name="kaina_nuo"" />
            <span class="input-group-addon">iki</span>
            <input type="number" class="input-sm form-control" name="kaina_iki"/>
        </div>
        <input type="number" hidden name="kambario_tipas" id="kambario_tipas" />
      <hr />
      <button type="button" class="btn btn-primary btn-lg btn-block">Ieškoti</button>
  </form>
</div>