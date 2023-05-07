<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Periode Laporan</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                      <label for="tanggal_awal" class="col-md-2 col-md-offside-1 control-label">Tanggal Awal</label>
                      <div class="col-md-12">
                          <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control" required autofocus>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_akhir" class="col-md-2 col-md-offside-1 control-label">Tanggal Akhir</label>
                        <div class="col-md-12">
                            <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
