angular.module('adminctrl', [])
    .controller('pageController', pageController)
    .controller('penyakitController', penyakitController)
    .controller('gejalaController', gejalaController)
    .controller('pengetahuanController', pengetahuanController)
    ;
function pageController($scope) {
    $scope.Title = "Page Header";
}

function penyakitController($scope, penyakitServices) {
    $scope.itemHeader = { title: "Data Penyakit", breadcrumb: "Penyakit", header: "Data Penyakit" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.model.penyebab = [];
    $scope.model.solusi = [];
    $scope.penyebab = "";
    $scope.solusi = "";
    $scope.tombol = false;
    $scope.title = "Tambah Peyakit";
    penyakitServices.get().then((x)=>{
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.addPenyebab = (item, set)=>{
        if(set=='add'){
            $scope.model.penyebab.push( angular.copy(item));
            $scope.penyebab = "";
        }else{
            var index = $scope.model.penyebab.indexOf(item)
            $scope.model.penyebab.splice(index, 1);
        }
    }
    $scope.addSolusi = (item, set)=>{
        if(set=='add'){
            $scope.model.solusi.push( angular.copy(item));
            $scope.solusi = "";
        }else{
            var index = $scope.model.solusi.indexOf(item)
            $scope.model.solusi.splice(index, 1);
        }
    }

    $scope.edit = (item)=>{
        $scope.model = angular.copy(item);
        $scope.tombol = true;
        $scope.title = "Ubah Peyakit " + item.penyakit;
        $("#tambahPenyakit").modal('show');
    }

    $scope.save = () => {
        if ($scope.model.id) {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin mengubah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false
            }).then((result) => {
                $.LoadingOverlay("show");
                if (result) {
                    penyakitServices.put($scope.model).then((x) => {
                        Swal.fire({
                            title: 'Success',
                            text: "Proses Berhasil",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result) {
                                $scope.model = {};
                                $scope.model.penyebab = [];
                                $scope.model.solusi = [];
                                $("#tambahPenyakit").modal('hide');
                                $scope.title = "Tambah Peyakit";
                            }
                        })
                    })
                    $.LoadingOverlay("hide");
                }
            })
        } else {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin menambah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false
            }).then((result) => {
                $.LoadingOverlay("show");
                if (result) {
                    penyakitServices.post($scope.model).then((x) => {
                        Swal.fire({
                            title: 'Success',
                            text: "Proses Berhasil",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result) {
                                $scope.model = {};
                                $scope.model.penyebab = [];
                                $scope.model.solusi = [];
                                $("#tambahPenyakit").modal('hide');
                                $scope.title = "Tambah Peyakit";
                            }
                        })
                    })
                    $.LoadingOverlay("hide");
                }
            })

        }
    }

    $scope.delete = (item)=>{
        Swal.fire({
            title: 'Konfirmasi!',
            text: 'Yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            allowOutsideClick: false
        }).then((result) => {
            $.LoadingOverlay("show");
            if (result) {
                penyakitServices.deleted(item).then((x)=>{
                    Swal.fire({
                        title: 'Success',
                        text: "Proses Berhasil",
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result) {
                            
                        }
                    })

                })
                $.LoadingOverlay("hide");
            }
        })
        
    }
}

function gejalaController($scope, gejalaServices) {
    $scope.itemHeader = { title: "Data Gejala", breadcrumb: "Gejala", header: "Data Gejala" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.tombol = false;
    gejalaServices.get().then((x)=>{
        $scope.datas = x;
        if(x.length==0){
            $scope.model.kode = "G1";
        }else{
            var item = x[x.length-1];
            $scope.model.kode = "G" + (parseInt(item.kode.substr(1))+1);
        }
        $.LoadingOverlay("hide");
    })

    $scope.edit = (item)=>{
        $scope.model = angular.copy(item);
        $scope.tombol = true;
    }

    $scope.save = () => {
        if ($scope.model.id) {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin mengubah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false
            }).then((result) => {
                $.LoadingOverlay("show");
                if (result) {
                    gejalaServices.put($scope.model).then((x) => {
                        Swal.fire({
                            title: 'Success',
                            text: "Proses Berhasil",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        })
                        $scope.model = {};
                        var item = $scope.datas[$scope.datas.length-1];
                        $scope.model.kode = "G" + (parseInt(item.kode.substr(1))+1);
                        $.LoadingOverlay("hide");
                    })
                }
            })
        } else {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin menambah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false
            }).then((result) => {
                $.LoadingOverlay("show");
                if (result) {
                    gejalaServices.post($scope.model).then((x) => {
                        Swal.fire({
                            title: 'Success',
                            text: "Proses Berhasil",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        })
                        $scope.model = {};
                        var item = $scope.datas[$scope.datas.length-1];
                        $scope.model.kode = "G" + (parseInt(item.kode.substr(1))+1);
                        $.LoadingOverlay("hide");
                    })
                }
            })

        }
    }

    $scope.delete = (item)=>{
        Swal.fire({
            title: 'Konfirmasi!',
            text: 'Yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            allowOutsideClick: false
        }).then((result) => {
            $.LoadingOverlay("show");
            if (result) {
                penyakitServices.deleted(item).then((x)=>{
                    Swal.fire({
                        title: 'Success',
                        text: "Proses Berhasil",
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result) {
                            
                        }
                    })

                })
                $.LoadingOverlay("hide");
            }
        })
        
    }
}

function pengetahuanController($scope, pengetahuanServices) {
    $scope.itemHeader = { title: "Data Pengetahuan", breadcrumb: "Pengetahuan", header: "Data Pengetahuan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.gejalas = [];
    $scope.gejala = {};
    $scope.penyakits = [];
    $scope.model = {};
    $scope.tombol = false;
    pengetahuanServices.get().then((x)=>{
        $scope.datas = x.data;
        $scope.penyakits = angular.copy($scope.datas);
        $scope.gejalas = x.gejala;
        // $scope.datas.forEach(element => {
        //     if(element.gejala.length==0){
        //         $scope.penyakits.push(angular.copy(element))
        //     }
        // });
        $.LoadingOverlay("hide");
    })

    $scope.edit = (item)=>{
        $scope.model.penyakit = angular.copy(item);
        $scope.tombol = true;
    }

    $scope.addGejala = (penyakit, gejala)=>{
        var item = {};
        item.gejalaid = gejala.id;
        item.mb = gejala.mb;
        item.kode = gejala.kode;
        item.gejala = gejala.gejala;
        penyakit.gejala.push(item);
        $scope.gejala = {};
    }

    $scope.removeGejala=(penyakit, gejala)=>{
        var index = penyakit.gejala.indexOf(gejala)
        penyakit.gejala.splice(index, 1);
    }

    $scope.save = () => {
        if ($scope.model.id) {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin mengubah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false
            }).then((result) => {
                $.LoadingOverlay("show");
                if (result) {
                    pengetahuanServices.put($scope.model.penyakit).then((x) => {
                        Swal.fire({
                            title: 'Success',
                            text: "Proses Berhasil",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        })
                        $scope.model = {};
                        $.LoadingOverlay("hide");
                    })
                }
            })
        } else {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin menambah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                allowOutsideClick: false
            }).then((result) => {
                $.LoadingOverlay("show");
                if (result) {
                    pengetahuanServices.post($scope.model.penyakit).then((x) => {
                        Swal.fire({
                            title: 'Success',
                            text: "Proses Berhasil",
                            icon: 'info',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        })
                        $scope.model = {};
                        $.LoadingOverlay("hide");
                    })
                }
            })

        }
    }

    $scope.delete = (item)=>{
        Swal.fire({
            title: 'Konfirmasi!',
            text: 'Yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            allowOutsideClick: false
        }).then((result) => {
            $.LoadingOverlay("show");
            if (result) {
                pengetahuanServices.deleted(item).then((x)=>{
                    Swal.fire({
                        title: 'Success',
                        text: "Proses Berhasil",
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result) {
                            
                        }
                    })

                })
                $.LoadingOverlay("hide");
            }
        })
        
    }
}