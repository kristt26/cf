angular.module("auth.service", [])

    .factory("AuthService", AuthService);

function AuthService($http, $q, helperServices) {

    var service = {};

    return {
        getHeader: getHeader,
    }

    function getHeader() {
        return {
            'Content-Type': 'application/json'
        }
    }
}