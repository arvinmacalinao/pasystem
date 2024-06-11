<?php 
    $start  = $rows->firstItem();
    $end    = $rows->lastItem();

    $currPage = $rows->currentPage();
    $prevPage = $currPage - 1;
    $nextPage = $currPage + 1;
    $lastPage = $rows->lastPage();

    if ($prevPage < 1) {
        $prevPage = 1;
    }

    if ($nextPage > $lastPage) {
        $nextPage = $lastPage;
    }
?>

<nav  class="" aria-label="...">
  <ul class="pagination">
    <li class="page-item">
      <a class="btn btn-sm btn-outline-primary rounded-0" href="{{ url()->current().'?page='.$prevPage }}">Previous</a>
    </li>
    <select id="form-select" class="btn btn-sm  btn-outline-primary rounded-0">
      @for($i = 1; $i <= $lastPage; $i++)
        <option value="{!! url()->current().'?page='.$i !!}"{!! ($i == $currPage ? ' selected="selected"' : '') !!}>Page {{ $i }} of {{ $lastPage }}</option>
      @endfor
    </select>
    <li class="page-item">
      <a class="btn btn-sm  btn-outline-primary rounded-0" href="{{ url()->current().'?page='.$nextPage }}">Next</a>
    </li>
  </ul>
</nav>