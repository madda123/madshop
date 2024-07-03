<main role="main" class="container">
        <?php $this->load->view('layouts/_alert')?>
        <div class="row">
          <!-- LEFT MAIN START -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                Formulir Alamat Pengiriman
              </div>
              <div class="card-body">
                <form action="">
                  <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima">
                    <small class="form-text text-danger">Nama wajib diisi.</small>
                  </div>
                  <div class="mb-3">
                    <label for="">Alamat</label>
                    <textarea type="text" class="form-control" id="" name="address" cols="30" rows="5"></textarea>
                    <small class="form-text text-danger">Alamat wajib diisi.</small>
                  </div>
                  <div class="mb-3">
                    <label for="">Telepon</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nomor telepon penerima">
                    <small class="form-text text-danger">Telepon wajib diisi.</small>
                  </div>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
              </div>
            </div>
          </div>
          <!-- LEFT MAIN END -->
      
          <!-- RIGHT MAIN START -->
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-header">
                    Pencarian
                  </div>
                  <div class="card-body">
                    <form action="">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari...">
                        <button class="btn btn-primary" type="button">Cari</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-header">
                    Kategori
                  </div>
                  <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Pcs</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach() : ?>
                            <tr>
                                <td>Product Title</td>
                                <td>3</td>
                                <td>Rp.100.000,00</td>
                            </tr>
                            <tr>
                                <td colspan="2">Subtotal</td>
                                <td>Rp.300.000,00</td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th>Rp.300.000,00</th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- RIGHT MAIN END -->
        </div>
      </main>