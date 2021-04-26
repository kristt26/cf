<div class="row" ng-controller="gejalaController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Gejala</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="kode"  class="col-form-label col-form-label-sm">Kode</label>
            <input type="text" class="form-control  form-control-sm" id="kode" ng-model="model.kode" placeholder="Input Kode Gejala" required>
          </div>
          <div class="form-group">
            <label for="gejala"  class="col-form-label col-form-label-sm">Gejala</label>
            <input type="text" class="form-control  form-control-sm" id="gejala" ng-model="model.gejala" placeholder="Input Gejala" required>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Ubah': 'Simpan'}}</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Gejala</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table datatable="ng" class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Gejala</th>
              <th>Gejala</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.kode}}</td>
              <td>{{item.gejala}}</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
