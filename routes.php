<?php
return [
    ['GET', '/', ['AuthController', 'showLogin']],
    ['GET', '/login', ['AuthController', 'showLogin']],
    ['POST', '/login', ['AuthController', 'login']],
    ['GET', '/logout', ['AuthController', 'logout'], ['auth']],

    ['GET', '/vaccines', ['VaccineController', 'index'], ['auth']],
    ['GET', '/vaccines/create', ['VaccineController', 'create'], ['auth']],
    ['POST', '/vaccines', ['VaccineController', 'store'], ['auth']],
    ['GET', '/vaccines/{id}/edit', ['VaccineController', 'edit'], ['auth']],
    ['POST', '/vaccines/{id}/update', ['VaccineController', 'update'], ['auth']],
    ['GET', '/vaccines/{id}/delete', ['VaccineController', 'delete'], ['auth']],

    ['GET', '/diseases', ['DiseaseController', 'index'], ['auth']],
    ['POST', '/diseases', ['DiseaseController', 'store'], ['auth']],
    ['GET', '/diseases/{id}/edit', ['DiseaseController', 'edit'], ['auth']],
    ['POST', '/diseases/{id}/update', ['DiseaseController', 'update'], ['auth']],
    ['GET', '/diseases/{id}/delete', ['DiseaseController', 'delete'], ['auth']],

    ['GET', '/customers/register', ['CustomerController', 'showForm'], ['auth']],
    ['POST', '/customers/register', ['CustomerController', 'register'], ['auth']],

    ['GET', '/vaccination/create', ['VaccinationController', 'create'], ['auth']],
    ['POST', '/vaccination/store', ['VaccinationController', 'store'], ['auth']],

    ['GET', '/history', ['HistoryController', 'index'], ['auth']],
    ['GET', '/statistics', ['StatisticsController', 'index'], ['auth']],

    ['GET', '/api/vaccines', ['ApiController', 'vaccines'], ['auth']],
];
