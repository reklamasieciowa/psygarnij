<!-- <form class="form-inline col-lg-3 my-4 my-lg-0" action="{{ route('search') }}" method="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Szukaj" aria-label="Szukaj" name="q" id="q">
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Szukaj</button>
</form> -->

    <form class="form-inline" action="{{ route('search') }}" method="GET">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Szukaj" aria-label="Szukaj" name="q" id="q">
      </div>
    </form>