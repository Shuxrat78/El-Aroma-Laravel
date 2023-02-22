      <!-- Ввод название товара -->
        <span class="input-group-text" id="inputGroup-sizing-lg">Названия товара</span>
        <input type="text" name="name" placeholder="Введите название товара" class="form-control shadow bg-body rounded" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
      </div>

      <!-- Выбор Бренда -->
      <div class="col-4">
        <div class="input-group input-group-lg mb-4">
          <label class="input-group-text"">Бренд</label>
            <select class="form-select shadow bg-body rounded" name="brend_id" id="inputGroupSelect01" required>
              <option selected></option>
              @foreach($brend as $brnd)
              <option value="{{$brnd->id}}">{{$brnd->name}}</option>
              @endforeach
            </select>
        </div>
      </div>

      <!-- Выбор категории -->
      <div class="col-5">
        <div class="input-group input-group-lg mb-4">
          <label class="input-group-text"">Категория</label>
            <select class="form-select shadow bg-body rounded" name="cat_id" id="inputGroupSelect01" required>
              <option selected></option>
              @foreach($category as $ctgry)
              <option value="{{$ctgry->id}}">{{$ctgry->name}}</option>
              @endforeach    
            </select>
        </div>
      </div>

      <!-- Выбор объема -->
      <div class="col-4">
        <div class="input-group input-group-lg mb-4">
          <label class="input-group-text"">Объем</label>
            <select class="form-select shadow bg-body rounded" name="cap_id" id="inputGroupSelect01" required>
              <option selected></option>
              @foreach($capacity as $cpcty)
              <option value="{{$cpcty->id}}">{{$cpcty->cpct}}</option>
              @endforeach
            </select>
        </div>
      </div>

      <!-- Ввод цены -->
      <div class="col-4">
        <div class="input-group input-group-lg mb-4">
          <span class="input-group-text" id="inputGroup-sizing-lg">Цена</span>
            <input type="number" name="price" placeholder="Цена" min="0" step="10000" class="form-control shadow bg-body rounded" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
        </div>
      </div>

      <!-- Выбор файла -->
      <div class="col-6">
        <div class="input-group input-group-lg mb-4">
          <input type="file" multiple name="file[]" class="form-control shadow bg-body rounded" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
        </div>
      </div>
