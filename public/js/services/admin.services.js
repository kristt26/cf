angular.module('admin.service', [])
    .factory('penyakitServices', penyakitServices)
    .factory('gejalaServices', gejalaServices)
    .factory('pengetahuanServices', pengetahuanServices)
    ;

function penyakitServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/admin/penyakit/';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };
    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }

    function post(item) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }
    function put(item) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find((x)=>x.id == item.id);
                if(data){
                    data.penyakit = item.penyakit;
                    data.deskripsi = item.deskripsi;
                    data.solusi = item.solusi;
                    data.gambar = res.data.gambar;
                }
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }

    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'delete/' + param.id
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }
}

function gejalaServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/admin/gejala/';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };
    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }

    function post(item) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }
    function put(item) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find((x)=>x.id == item.id);
                if(data){
                    data.kode = item.kode;
                    data.gejala = item.gejala;
                }
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }

    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'delete/' + param.id
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }
}

function pengetahuanServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/admin/pengetahuan/';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };
    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }

    function post(item) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.data.find((x)=>x.id == item.id);
                data.gejala = res.data.gejala;
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }
    function put(item) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find((x)=>x.id == item.id);
                if(data){
                    data.gejala = res.data.gejala;
                }
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }

    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + 'delete/' + param.id
        }).then(
            (res) => {
                var data = service.data.data.find((x)=>x.id==param.id);
                var index = data.gejala.indexOf(param)
                data.gejala.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.data
                })
                $.LoadingOverlay("hide");
                def.reject(err);
            }
        );
        return def.promise;
    }
}