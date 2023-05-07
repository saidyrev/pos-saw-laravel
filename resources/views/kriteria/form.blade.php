<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="POST" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                      <label for="nama" class="col-md-2 col-md-offside-1 control-label">Nama Kriteria</label>
                      <div class="col-md-12">
                          <input type="text" name="nama" id="nama" class="form-control" required autofocus>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                      <div class="form-group row">
                        <label for="atribut" class="col-md-2 col-md-offside-1 control-label">Atribut</label>
                        <div class="col-md-12">
                            <select name="atribut" id="atribut" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="cost">Cost</option>
                                <option value="benefit">Benefit</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="bobot" class="col-md-2 col-md-offside-1 control-label">Bobot</label>
                        <div class="col-md-12">
                            <input type="number" name="bobot" id="bobot" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
