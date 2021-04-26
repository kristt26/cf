<div class="row" ng-controller="pengetahuanController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Pengetahuan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="kode"  class="col-form-label col-form-label-sm">Penyakit</label>
            <select class="form-control form-control-sm select2" ng-options="item as item.penyakit for item in penyakits track by item.id" ng-model="model.penyakit" id="penyakit">
                <option value=""></option>
            </select>
          </div>
          <div class="form-group" ng-show="model.penyakit">
            <label for="gejala"  class="col-form-label col-form-label-sm">Gejala</label>
            <select class="form-control form-control-sm select2" ng-options="item as (item.kode + ' - ' + item.gejala) for item in gejalas track by item.id" ng-model="gejala" id="gejala" ng-change="addGejala(model.penyakit, gejala)">
                <option value=""></option>
            </select>
            <table class="table table-sm table-hover table-bordered" ng-show="model.penyakit.gejala.length>0">
                <tr>
                    <th width="10%">Kode</th>
                    <th width="60%">Gejala</th>
                    <th>MB</th>
                    <th><i class="fas fa-cog"></i></th>
                </tr>
                <tr ng-repeat="item in model.penyakit.gejala">
                    <td>{{item.kode}}</td>
                    <td>{{item.gejala}}</td>
                    <td><input type="text" class="form-control  form-control-sm" id="mb" ng-model="item.mb" placeholder="MB" required></td>
                    <td><button type="button" class="btn btn-danger btn-sm" ng-click ="removeGejala(model.penyakit, item)"><i class="fas fa-minus"></i></button></td>
                </tr>
            </table>
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
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Pengetahuan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-sm table-hover table-bordered table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Penyakit</th>
              <th>Gejala</th>
              <th>MB</th>
              <th colspan="2"><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody ng-repeat="item in datas">
            <tr>
              <td rowspan="{{item.gejala.length+1}}">{{$index+1}}</td>
              <td rowspan="{{item.gejala.length+1}}">{{item.penyakit}}</td>
            </tr>
            <tr ng-repeat= "gejala in item.gejala">
                <td>{{gejala.gejala}}</td>
                <td>{{gejala.mb}}</td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" ng-click ="delete(gejala)"><i class="fas fa-trash"></i></button>
                </td>
                <td ng-if="$index==0" rowspan="{{item.gejala.length+1}}">
                    <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
            <tr>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
