<!-- Modal for adding new data -->
<div class="modal fade" id="addDataSellModal" tabindex="-1" aria-labelledby="addDataSellModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDataSellForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataSellModalLabel">Jual Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($columnsSubset as $column)
                        @php
                            $lowerColumn = strtolower($column);
                        @endphp
                        @if ($lowerColumn === 'gambar')
                            <div class="mb-3">
                                <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                                <input type="file" class="form-control" id="{{ $column }}" name="{{ $column }}" required>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-{{ $column }}"></div>
                            </div>
                        @elseif ($lowerColumn === 'deskripsi')
                            <div class="mb-3">
                                <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                                <textarea class="form-control" id="{{ $column }}" name="{{ $column }}" rows="4" required></textarea>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-{{ $column }}"></div>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="{{ $column }}" class="form-label">{{ $column }}</label>
                                <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" required>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-{{ $column }}"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Jual</button>
                </div>
            </form>
        </div>
    </div>
</div>
