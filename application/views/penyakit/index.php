<div class="row" ng-controller="penyakitController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Penyakit</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahPenyakit">
            Tambah Penyakit
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table datatable="ng" class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Penyakit</th>
              <th>Deskripsi</th>
              <th>Penyebab</th>
              <th>Solusi</th>
              <th>file</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.penyakit}}</td>
              <td class="text-wrap">{{item.deskripsi}}</td>
              <td class="text-wrap">
                <ul>
                  <li ng-repeat="penye in item.penyebab">{{penye}}</li>
                </ul>
              </td>
              <td class="text-wrap">
                <ul>
                  <li ng-repeat="solu in item.solusi">{{solu}}</li>
                </ul>
              </td>
              <td><img ng-src="<?=base_url('public/img/penyakit/')?>{{item.gambar}}" alt="" width="150px"></td>
              <td>
                <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                    class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" ng-click="delete(item)"><i
                    class="fas fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="tambahPenyakit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title">{{title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" name="form" ng-submit="save()">
            <div class="form-group">
              <label for="penyakit" class="col-form-label col-form-label-sm">Penyakit</label>
              <input type="text" class="form-control  form-control-sm" id="penyakit" ng-model="model.penyakit"
                placeholder="Nama Penyakit">
            </div>
            <div class="form-group">
              <label for="deskripsi" class="col-form-label col-form-label-sm">Deskripsi</label>
              <textarea class="form-control  form-control-sm" id="deskripsi" ng-model="model.deskripsi"
                placeholder="Deskripsi Penyakit" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="penyebab" class="col-form-label col-form-label-sm">Penyebab</label>
              <div class="row">
                <div class="col-md-11">
                  <input class="form-control  form-control-sm" id="penyebab" ng-model="penyebab"
                    placeholder="Penyebab Penyakit">
                </div>
                <div class="col-md-1 pull-right">
                  <button type="button" class="btn btn-primary btn-sm" ng-click="addPenyebab(penyebab, 'add')"><i
                      class="fas fa-plus"></i></button>
                </div>
              </div>
              <ul>
                <li ng-repeat="item in model.penyebab">{{item}} <button type="button" class="btn btn-danger btn-sm"
                    ng-click="addPenyebab(penyebab, 'remove')"><i class="fas fa-minus"></i></button></li>
              </ul>
            </div>
            <div class="form-group">
              <label for="solusi" class="col-form-label col-form-label-sm">Solusi</label>
              <div class="row">
                <div class="col-md-11">
                  <input class="form-control  form-control-sm" id="solusi" ng-model="solusi"
                    placeholder="Solusi Penyakit">
                </div>
                <div class="col-md-1 pull-right">
                  <button type="button" class="btn btn-primary btn-sm" ng-click="addSolusi(solusi, 'add')"><i
                      class="fas fa-plus"></i></button>
                </div>
              </div>
              <ul>
                <li ng-repeat="item in model.solusi">{{item}} <button type="button" class="btn btn-danger btn-sm"
                    ng-click="addSolusi(solusi, 'remove')"><i class="fas fa-minus"></i></button></li>
              </ul>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-form-label col-form-label-sm">Gambar</label>
              <div class="">
                <div class="custom-file">
                  <input type="file" class="custom-file-input form-control-sm" id="file" name="file" id="file"
                    ng-model="model.file" accept="image/*" maxsize="2000" base-sixty-four-input>
                  <label class="custom-file-label col-form-label-sm" for="file">{{(model.file && model.file.filename) ?
                    model.file.filename : model.gambar ? model.gambar : 'Pilih file Penyakit'}}</label>
                </div>
                <span style="color:red;" ng-show="form.file.$error.maxsize">File tidak boleh lebih dari 2 MB</span>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary btn-sm pull-right">{{tombol ? 'Ubah': 'Simpan'}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>