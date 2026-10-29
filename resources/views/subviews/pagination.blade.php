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

<div class="btn-group mb-2">
    <a class="btn btn-primary btn-sm" href="{{ request()->fullUrlWithQuery(['page' => 1]) }}" title="First Page"><span class="fa fa-angle-double-left"></span></a>
    <a class="btn btn-primary btn-sm" href="{{ request()->fullUrlWithQuery(['page' => $prevPage]) }}" title="Previous Page"><span class="fa fa-angle-left"></span></a>
    
    <!-- Dropdown for page selection with the original classes intact -->
    <select id="page-select" class="btn btn-primary btn-sm">
      @for($i = 1; $i <= $lastPage; $i++)
        <option value="{{ request()->fullUrlWithQuery(['page' => $i]) }}"{{ $i == $currPage ? ' selected="selected"' : '' }}>Page {{ $i }} of {{ $lastPage }}</option>
      @endfor
    </select>
    
    <a class="btn btn-primary btn-sm" href="{{ request()->fullUrlWithQuery(['page' => $nextPage]) }}" title="Next Page"><span class="fa fa-angle-right"></span></a>
    <a class="btn btn-primary btn-sm" href="{{ request()->fullUrlWithQuery(['page' => $lastPage]) }}" title="Last Page"><span class="fa fa-angle-double-right"></span></a>
    <div class="btn btn-primary btn-sm">{{ $rows->total() }} item{{ ($rows->total() > 1 ? 's' : '') }} found.</div>
</div>


<!-- JavaScript to handle dropdown navigation without altering the CSS class -->
<script>
    document.getElementById('page-select').addEventListener('change', function() {
        window.location.href = this.value; // Redirect to the selected page URL
    });
</script>
